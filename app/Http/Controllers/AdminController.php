<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Sitemap\SitemapGenerator;
use GrahamCampbell\Markdown\Facades\Markdown;
use Carbon\Carbon;
use App\User;
use App\Role;
use App\Course;
use App\Order;
use App\Payment;
use App\Category;
use App\Coupon;
use App\Carousel;
use App\Post;

class AdminController extends Controller
{
    protected $limit = 10;
    protected $style = [];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        $this->style = [
            'status' => [
                'pending' => 'warning',
                'paid' => 'success',
                'approved' => 'success',
                'cancelled' => 'danger',
            ]
        ];
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        authorizeRoles(['admin', 'editor']);

        $courses = Course::latest()->limit($this->limit)->get();
        $users = User::latest()->limit($this->limit)->get();
        $orders = Order::latest()->limit($this->limit)->get();

        // \DB::enableQueryLog();
        $earnings = Payment::select('date', DB::raw('sum(amount) as amount'))->whereNotNull('approved_at')->groupBy('date')->get();
        // dd(\DB::getQueryLog());
        
        $earnings->pluck('date', 'amount');

        $style = $this->style;

        return view('admin.dashboard', compact('users', 'courses', 'orders', 'earnings', 'style'));
    }

    public function courses($tab = '')
    {
        authorizeRoles(['admin', 'editor', 'author']);
        $authUser = request()->user();

        $column = request('column') ?: 'updated_at';
        $sort = request('sort') ?: 'DESC';

        if($authUser->authorizeRoles(['admin', 'editor'])){

            if($tab == 'published'){
                $courses = Course::where('published_at', '<=', now())
                        ->orderBy($column, $sort)
                        ->filter(request()->only(['q']))
                        ->paginate($this->limit);
            }elseif($tab == 'draft'){
                $courses = Course::where('published_at', null)
                        ->orderBy($column, $sort)
                        ->filter(request()->only(['q']))
                        ->paginate($this->limit);
            }else{
                $courses = Course::orderBy($column, $sort)
                        ->filter(request()->only(['q']))
                        ->paginate($this->limit);
            }
                

        }elseif($authUser->authorizeRoles('author')){
            $courses = Course::where('author_id', $authUser->id)->orderBy($column, $sort)->filter(request()->only(['q']))->paginate($this->limit);
        }

        $coursesCount = Course::filter(request()->only(['q']))->count();

        return view('admin.courses', compact('courses', 'coursesCount'));
    }


    /** 
     * Users
     */
    public function users($tab = '')
    {
        authorizeRoles(['admin']);
        
        $column = request('column') ?: 'name';
        $sort = request('sort') ?: 'asc';
        
        if($tab == 'student'){
            $users = User::whereHas('roles', function($query){ $query->where('name', 'student'); })
                        ->orderBy($column, $sort)
                        ->filter(request()->only(['q']))
                        ->paginate($this->limit);
        }
        elseif($tab == 'admin'){
            $users = User::whereHas('roles', function($query){ $query->where('name', '!=', 'student'); })
                        ->orderBy($column, $sort)
                        ->filter(request()->only(['q']))
                        ->paginate($this->limit);
        }
        else{
            $users = User::orderBy($column, $sort)->filter(request()->only(['q']))->paginate($this->limit);
        }


        return view("admin.users", compact('users'));
    }


    /**
     * Orders
     */
    public function orders($tab = 'pending')
    {
        authorizeRoles(['admin']);

        $column = request('column') ?: 'created_at';
        $sort = request('sort') ?: 'DESC';

        if($tab == 'pending'){
            $orders = Order::where('status', 'pending')
                        ->orderBy($column, $sort)
                        ->filter(request()->only(['q']))
                        ->paginate($this->limit);
        }elseif($tab == 'approved'){
            $orders = Order::where('status', 'paid')
                        ->orderBy($column, $sort)
                        ->filter(request()->only(['q']))
                        ->paginate($this->limit);
        }elseif($tab == 'cancelled'){
            $orders = Order::where('status', 'cancelled')
                        ->orderBy($column, $sort)
                        ->filter(request()->only(['q']))
                        ->paginate($this->limit);
        }else{
            $orders = Order::orderBy($column, $sort)
                        ->filter(request()->only(['q']))
                        ->paginate($this->limit);
        }

        $style = $this->style;
        
        return view("admin.orders", compact('orders', 'style'));
    }



    /**
     * Coupons
     */
    public function coupons($tab = '')
    {
        authorizeRoles(['admin']);

        $column = request('column') ?: 'created_at';
        $sort = request('sort') ?: 'DESC';

        if($tab == 'expired'){
            $coupons = Coupon::where('expire_date', '<', now())
                            ->orderBy($column, $sort)
                            ->filter(request()->only(['q']))
                            ->paginate($this->limit);
        }else{
            $coupons = Coupon::where('expire_date', '>=', now())
                            ->orderBy($column, $sort)
                            ->filter(request()->only(['q']))
                            ->paginate($this->limit);
        }

        return view("admin.coupons", compact('coupons'));
    }



    /** 
     * Categories
     */
    public function categories()
    {
        authorizeRoles(['admin', 'editor']);

        $column = request('column') ?: 'title';
        $sort = request('sort') ?: 'ASC';

        $categories = Category::with('courses')
                                ->orderBy($column, $sort)
                                ->filter(request()->only(['q']))
                                ->paginate($this->limit);

        return view("admin.categories", compact('categories'));
    }

    public function carousels()
    {
        authorizeRoles(['admin']);

        $carousels = Carousel::orderBy('created_at', 'DESC')
                                ->filter(request()->only(['q']))
                                ->paginate($this->limit);

        return view("admin.carousels", compact('carousels'));
    }

    public function posts($tab = '')
    {
        authorizeRoles(['admin']);

        $column = request('column') ?: 'updated_at';
        $sort = request('sort') ?: 'DESC';

        if($tab == 'published'){
            $posts = Post::published()
                            ->orderBy($column, $sort)
                            ->filter(request()->only(['q']))
                            ->paginate($this->limit);
        }elseif($tab == 'draft'){
            $posts = Post::draft()
                            ->orderBy($column, $sort)
                            ->filter(request()->only(['q']))
                            ->paginate($this->limit);
        }elseif($tab == 'trashed'){
            $posts = Post::onlyTrashed()
                            ->orderBy($column, $sort)
                            ->filter(request()->only(['q']))
                            ->paginate($this->limit);
        }else{
            $posts = Post::orderBy($column, $sort)
                            ->filter(request()->only(['q']))
                            ->paginate($this->limit);
        }
                        

        return view("admin.posts", compact('posts'));
    }
    
    public function earnings()
    {
        $courses = Course::has('orders')->get();
        $orders = Order::where('status', 'paid')->get();
        $earnings = Order::select(DB::raw('sum(net_price) as `amount`'), DB::raw("CONCAT_WS('-',YEAR(created_at),MONTH(created_at)) as monthyear"))
                            ->where('status', 'paid')
                            ->groupby('monthyear')
                            ->get();

        return view('admin.earnings', compact('courses', 'orders', 'earnings'));
    }

    public function statement()
    {
        authorizeRoles(['admin']);

        $fromDate = request('from') ?: Carbon::parse('first day of this month')->format('Y-m-d');
        $toDate = request('to') ?: Carbon::now()->format('Y-m-d');
        
        $column = request('column') ?: 'created_at';
        $sort = request('sort') ?: 'DESC';

        $payments = Payment::whereBetween('date', [$fromDate, $toDate])->whereNotNull('approved_at')->orderBy($column, $sort)->paginate($this->limit);
        $totalAmount = Payment::whereBetween('date', [$fromDate, $toDate])->whereNotNull('approved_at')->sum('amount');
        
        return view("admin.statement", compact('payments', 'totalAmount'));
    }

    public function invoice(Order $order)
    {
        authorizeRoles(['admin']);
        $style = $this->style;
        return view("admin.invoice", compact('order', 'style'));
    }


    public function changelog()
    {
        $content = Markdown::convertToHtml(e(file_get_contents(base_path('readme.md'))));
        return view('admin.changelog', compact('content'));
    }

    public function sitemapGenerate(SitemapGenerator $sitemap)
    {
        authorizeRoles(['admin']);

        ini_set('max_execution_time', 3000);

        echo "Sitemap generating for " . $url = config('app.url');
        $path = public_path('sitemap.xml');
        $create = $sitemap->create("http://course.vcommerce.co.th")->writeToFile($path);

        if($create){
            dd($create);
        }
    }
}
