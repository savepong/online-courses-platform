<h3>ยินดีด้วยคุณได้ครับคูปองเรียนคอร์ส <strong>{{ $course->title }}</strong> มูลค่า <strong>{{ number_format($course->sele_price,2) }} บาท</strong> ฟรี</h3>

กรุณาใช้รหัสคูปองนี้ <strong>{{ $coupon->code }}</strong> เพื่อรับสิทธิ์เรียนฟรี

<br>

<a href="{{ route('course.view', $course->slug) }}">ไปยังหน้าสั่งซื้อคอร์ส</a>