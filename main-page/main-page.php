<?php
    session_start();
    if (isset($_SESSION['username']) && $_SESSION['username'] != NULL) {
        session_destroy();
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main-page.css">
    <title>Document</title>
</head>

<body>
    <header>
        <img src="banner.png" alt="banner">
        <h1>UIBlog</h1>
    </header>
    <main>
        <p>UITBlog là nơi chuyên giới thiệu các tin tức, kinh nghiệm và các địa điểm du lịch đẹp tại Việt Nam. Các điểm
            đến hấp dẫn cũng như hướng dẫn khách du lịch đều được public đầy đủ trên blog, ngoài ra Blog còn có mục
            thông tin về các món ẩm thực ngon.</p>
        <input onclick="openSignInOvp()" type="button" id="sign-in" value="Đăng nhập">
        <input onclick="openSignUpOvp()" type="button" id="sign-up" value="Đăng ký">
        <div id="overlay">
            <div id="overlay-background"></div>
            <iframe id="sign-in__overlay" src="../sign-in/sign-in.php" width="420px" height="620px" frameborder="0"></iframe>
            <iframe id="sign-up__overlay" src="../sign-up/sign-up.php" width="420px" height="620px" frameborder="0"></iframe>
        </div>
    </main>

    <footer>
        <img src="teamwork_1536.jpg" alt="teamwork_image">
        <p id="copyright">Copyright &copy 2021 UITour Company</p>
        <div id="transparency"></div>
        <section class="info">
            <h2 class="info__title">Thông tin công ty</h2>
            <hr class="info__underline"><br>
            <div>
                <p>Công ty được thành lập từ tháng 9 năm 2021</p>
                <p>Dẫn đầu danh sách ít khách du lịch nhất Việt Nam </p>
                <p>Với những chiến lược kinh doanh vô cùng hiệu quả thì hiện nay công ty đang dần chuyển sang bán kem
                    trộn để cải thiện tiềm lực kinh tế</p>
            </div>
            <iframe src="" frameborder="0"></iframe>
        </section>
        <section class="working-time">
            <h2 class="working-time__title">Thời gian làm việc</h2>
            <hr class="working-time__underline"><br>
            <ul>
                <il>
                    <p>Thứ 2: từ 6h00 - 17h00</p>
                </il>
                <il>
                    <p>Thứ 3: từ 6h00 - 17h00</p>
                </il>
                <il>
                    <p>Thứ 4: từ 6h00 - 17h00</p>
                </il>
                <il>
                    <p>Thứ 5: từ 6h00 - 17h00</p>
                </il>
                <il>
                    <p>Thứ 6: từ 6h00 - 17h00</p>
                </il>
                <il>
                    <p>Thứ 7: từ 6h00 - 17h00</p>
                </il>
                <il>
                    <p>Chủ nhật: từ 6h00 - 17h00</p>
                </il>
            </ul>
        </section>
        <section class="support">
            <h2 class="support__title">Hỗ trợ</h2>
            <hr class="support__underline">
            <div>
                <p>Quên mật khẩu?</p>
                <p>FAQ</p>
            </div>
        </section>
        <section class="connection">

            <span class="ti-location-pin"></span>
            <div class="connection__address">
                <p><strong>Địa chỉ</strong><br>Vincom Thủ Đức</p>
            </div>

            <span class="ti-mobile"></span>
            <div class="connection__phone">
                <p><strong>Điện thoại</strong><br>0123456789</p>
            </div>
            <span class="ti-email"></span>
            <div class="connection__email">
                <p><strong>Email</strong><br>kemkabi_chipu@gmail.com</p>
            </div>
            <hr>
            <p>Kết nối với chúng tôi:</p>
            <span class="ti-facebook"></span>
            <span class="ti-google"></span>
            <span class="ti-linkedin"></span>
        </section>
    </footer>
</body>
<script>
    const overlayBackground = document.getElementById('overlay-background')
    const signInOverlay = document.getElementById('sign-in__overlay')
    const signUpOverlay = document.getElementById('sign-up__overlay')

    //Event when click overlay background 
    overlayBackground.addEventListener('click',()=>{
        // hidden overlay windows
        overlayBackground.style.display = 'none'
        signInOverlay.style.display = 'none'
        signUpOverlay.style.display = 'none'
        
        //reload iframe
        signInOverlay.setAttribute('src','../sign-in/sign-in.php')
        signUpOverlay.setAttribute('src','../sign-up/sign-up.php')
    })
    
    //sign in button clicking evt
    function openSignInOvp(){
        overlayBackground.style.display = 'block'
        signInOverlay.style.display = 'block'
    }
    //sign un button clicking evt
    function openSignUpOvp(){
        overlayBackground.style.display = 'block'
        signUpOverlay.style.display = 'block'
    }
</script>
</html>
<!-- ⢕⢕⢕⢕⢕⢕⢕⠅⢗⢕⢕⢕⢕⢕⢕⢕⠕⠕⢕⢕⢕⢕⢕⢕⢕⢕⢕
⢐⢕⢕⢕⢕⢕⣕⢕⢕⠕⠁⢕⢕⢕⢕⢕⢕⢕⢕⠅⡄⢕⢕⢕⢕⢕⢕⢕⢕⢕
⢕⢕⢕⢕⢕⠅⢗⢕⠕⣠⠄⣗⢕⢕⠕⢕⢕⢕⠕⢠⣿⠐⢕⢕⢕⠑⢕⢕⠵⢕
⢕⢕⢕⢕⠁⢜⠕⢁⣴⣿⡇⢓⢕⢵⢐⢕⢕⠕⢁⣾⢿⣧⠑⢕⢕⠄⢑⢕⠅⢕
⢕⢕⠵⢁⠔⢁⣤⣤⣶⣶⣶⡐⣕⢽⠐⢕⠕⣡⣾⣶⣶⣶⣤⡁⢓⢕⠄⢑⢅⢑
⠍⣧⠄⣶⣾⣿⣿⣿⣿⣿⣿⣷⣔⢕⢄⢡⣾⣿⣿⣿⣿⣿⣿⣿⣦⡑⢕⢤⠱⢐
⢠⢕⠅⣾⣿⠋⢿⣿⣿⣿⠉⣿⣿⣷⣦⣶⣽⣿⣿⠈⣿⣿⣿⣿⠏⢹⣷⣷⡅⢐
⣔⢕⢥⢻⣿⡀⠈⠛⠛⠁⢠⣿⣿⣿⣿⣿⣿⣿⣿⡀⠈⠛⠛⠁⠄⣼⣿⣿⡇⢔
⢕⢕⢽⢸⢟⢟⢖⢖⢤⣶⡟⢻⣿⡿⠻⣿⣿⡟⢀⣿⣦⢤⢤⢔⢞⢿⢿⣿⠁⢕
⢕⢕⠅⣐⢕⢕⢕⢕⢕⣿⣿⡄⠛⢀⣦⠈⠛⢁⣼⣿⢗⢕⢕⢕⢕⢕⢕⡏⣘⢕
⢕⢕⠅⢓⣕⣕⣕⣕⣵⣿⣿⣿⣾⣿⣿⣿⣿⣿⣿⣿⣷⣕⢕⢕⢕⢕⡵⢀⢕⢕
⢑⢕⠃⡈⢿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⢃⢕⢕⢕
⣆⢕⠄⢱⣄⠛⢿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⠿⢁⢕⢕⠕⢁
⣿⣦⡀⣿⣿⣷⣶⣬⣍⣛⣛⣛⡛⠿⠿⠿⠛⠛⢛⣛⣉⣭⣤⣂⢜⠕⢑ -->