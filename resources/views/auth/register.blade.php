<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký tài khoản</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            padding: 20px;
        }
        .container {
            max-width: 500px;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-weight: bold;
        }
        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }
        input:focus {
            outline: none;
            border-color: #4CAF50;
        }
        .error {
            color: #f44336;
            font-size: 12px;
            margin-top: 5px;
            display: none;
        }
        .error.show {
            display: block;
        }
        input.invalid {
            border-color: #f44336;
        }
        button {
            width: 100%;
            padding: 12px;
            background: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            font-weight: bold;
        }
        button:hover {
            background: #45a049;
        }
        button:disabled {
            background: #ccc;
            cursor: not-allowed;
        }
        .success {
            background: #4CAF50;
            color: white;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 20px;
            text-align: center;
        }
        .login-link {
            text-align: center;
            margin-top: 20px;
        }
        .login-link a {
            color: #4CAF50;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Đăng ký tài khoản</h2>

        @if(session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

        <form id="registerForm" method="POST" action="{{ route('register') }}" novalidate>
            @csrf
            
            <div class="form-group">
                <label for="name">Họ và tên <span style="color: red;">*</span></label>
                <input type="text" id="name" name="name" placeholder="Nhập họ và tên">
                <div class="error" id="nameError"></div>
            </div>

            <div class="form-group">
                <label for="email">Email <span style="color: red;">*</span></label>
                <input type="email" id="email" name="email" placeholder="Nhập email">
                <div class="error" id="emailError"></div>
            </div>

            <div class="form-group">
                <label for="password">Mật khẩu <span style="color: red;">*</span></label>
                <input type="password" id="password" name="password" placeholder="Nhập mật khẩu">
                <div class="error" id="passwordError"></div>
            </div>

            <div class="form-group">
                <label for="password_confirmation">Xác nhận mật khẩu <span style="color: red;">*</span></label>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Nhập lại mật khẩu">
                <div class="error" id="confirmPasswordError"></div>
            </div>

            <button type="submit">Đăng ký</button>
        </form>

        <div class="login-link">
            Đã có tài khoản? <a href="#">Đăng nhập ngay</a>
        </div>
    </div>

    <script>
        // ==================== CLIENT-SIDE VALIDATION ====================
        // Phần này xử lý validation phía client (trình duyệt) trước khi gửi form lên server
        
        // Lấy các element từ HTML
        const form = document.getElementById('registerForm'); // Form đăng ký
        const nameInput = document.getElementById('name'); // Ô input họ tên
        const emailInput = document.getElementById('email'); // Ô input email
        const passwordInput = document.getElementById('password'); // Ô input mật khẩu
        const confirmPasswordInput = document.getElementById('password_confirmation'); // Ô input xác nhận mật khẩu

        // ==================== HÀM VALIDATE HỌ TÊN ====================
        /**
         * Kiểm tra tính hợp lệ của họ tên
         * - Không được để trống
         * - Phải có ít nhất 2 ký tự
         * - Không được vượt quá 255 ký tự
         * @returns {boolean} true nếu hợp lệ, false nếu không hợp lệ
         */
        function validateName() {
            const name = nameInput.value.trim(); // Lấy giá trị và xóa khoảng trắng 2 đầu
            const nameError = document.getElementById('nameError'); // Element hiển thị lỗi
            
            // Kiểm tra rỗng
            if (name === '') {
                showError(nameInput, nameError, 'Vui lòng nhập họ và tên');
                return false;
            }
            
            // Kiểm tra độ dài tối thiểu
            if (name.length < 2) {
                showError(nameInput, nameError, 'Họ tên phải có ít nhất 2 ký tự');
                return false;
            }
            
            // Kiểm tra độ dài tối đa
            if (name.length > 255) {
                showError(nameInput, nameError, 'Họ tên không được vượt quá 255 ký tự');
                return false;
            }
            
            // Nếu hợp lệ, ẩn thông báo lỗi
            hideError(nameInput, nameError);
            return true;
        }

        // ==================== HÀM VALIDATE EMAIL ====================
        /**
         * Kiểm tra tính hợp lệ của email
         * - Không được để trống
         * - Phải đúng định dạng email (có @ và dấu chấm)
         * - Không được vượt quá 255 ký tự
         * @returns {boolean} true nếu hợp lệ, false nếu không hợp lệ
         */
        function validateEmail() {
            const email = emailInput.value.trim(); // Lấy giá trị và xóa khoảng trắng
            const emailError = document.getElementById('emailError'); // Element hiển thị lỗi
            // Regex kiểm tra định dạng email: phải có ký tự @ và dấu chấm
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            
            // Kiểm tra rỗng
            if (email === '') {
                showError(emailInput, emailError, 'Vui lòng nhập email');
                return false;
            }
            
            // Kiểm tra định dạng email bằng regex
            if (!emailRegex.test(email)) {
                showError(emailInput, emailError, 'Email không hợp lệ');
                return false;
            }
            
            // Kiểm tra độ dài tối đa
            if (email.length > 255) {
                showError(emailInput, emailError, 'Email không được vượt quá 255 ký tự');
                return false;
            }
            
            // Nếu hợp lệ, ẩn thông báo lỗi
            hideError(emailInput, emailError);
            return true;
        }

        // ==================== HÀM VALIDATE MẬT KHẨU ====================
        /**
         * Kiểm tra tính hợp lệ của mật khẩu
         * - Không được để trống
         * - Phải có ít nhất 8 ký tự
         * - Phải có ít nhất 1 chữ hoa (A-Z)
         * - Phải có ít nhất 1 chữ thường (a-z)
         * - Phải có ít nhất 1 số (0-9)
         * - Phải có ít nhất 1 ký tự đặc biệt (!@#$%...)
         * @returns {boolean} true nếu hợp lệ, false nếu không hợp lệ
         */
        function validatePassword() {
            const password = passwordInput.value; // Lấy giá trị mật khẩu
            const passwordError = document.getElementById('passwordError'); // Element hiển thị lỗi
            
            // Kiểm tra rỗng
            if (password === '') {
                showError(passwordInput, passwordError, 'Vui lòng nhập mật khẩu');
                return false;
            }
            
            // Kiểm tra độ dài tối thiểu
            if (password.length < 8) {
                showError(passwordInput, passwordError, 'Mật khẩu phải có ít nhất 8 ký tự');
                return false;
            }
            
            // Kiểm tra có chữ hoa (A-Z) bằng regex
            if (!/[A-Z]/.test(password)) {
                showError(passwordInput, passwordError, 'Mật khẩu phải có ít nhất 1 chữ hoa');
                return false;
            }
            
            // Kiểm tra có chữ thường (a-z) bằng regex
            if (!/[a-z]/.test(password)) {
                showError(passwordInput, passwordError, 'Mật khẩu phải có ít nhất 1 chữ thường');
                return false;
            }
            
            // Kiểm tra có số (0-9) bằng regex
            if (!/[0-9]/.test(password)) {
                showError(passwordInput, passwordError, 'Mật khẩu phải có ít nhất 1 số');
                return false;
            }
            
            // Kiểm tra có ký tự đặc biệt bằng regex
            if (!/[!@#$%^&*(),.?":{}|<>]/.test(password)) {
                showError(passwordInput, passwordError, 'Mật khẩu phải có ít nhất 1 ký tự đặc biệt');
                return false;
            }
            
            // Nếu hợp lệ, ẩn thông báo lỗi
            hideError(passwordInput, passwordError);
            return true;
        }

        // ==================== HÀM VALIDATE XÁC NHẬN MẬT KHẨU ====================
        /**
         * Kiểm tra xác nhận mật khẩu có khớp với mật khẩu không
         * - Không được để trống
         * - Phải giống với mật khẩu đã nhập
         * @returns {boolean} true nếu hợp lệ, false nếu không hợp lệ
         */
        function validateConfirmPassword() {
            const password = passwordInput.value; // Lấy mật khẩu gốc
            const confirmPassword = confirmPasswordInput.value; // Lấy mật khẩu xác nhận
            const confirmPasswordError = document.getElementById('confirmPasswordError'); // Element hiển thị lỗi
            
            // Kiểm tra rỗng
            if (confirmPassword === '') {
                showError(confirmPasswordInput, confirmPasswordError, 'Vui lòng xác nhận mật khẩu');
                return false;
            }
            
            // So sánh 2 mật khẩu có giống nhau không
            if (password !== confirmPassword) {
                showError(confirmPasswordInput, confirmPasswordError, 'Mật khẩu xác nhận không khớp');
                return false;
            }
            
            // Nếu hợp lệ, ẩn thông báo lỗi
            hideError(confirmPasswordInput, confirmPasswordError);
            return true;
        }

        // ==================== HÀM HIỂN THỊ LỖI ====================
        /**
         * Hiển thị thông báo lỗi cho input
         * @param {HTMLElement} input - Ô input bị lỗi
         * @param {HTMLElement} errorElement - Element hiển thị thông báo lỗi
         * @param {string} message - Nội dung thông báo lỗi
         */
        function showError(input, errorElement, message) {
            input.classList.add('invalid'); // Thêm class 'invalid' để đổi màu viền đỏ
            errorElement.textContent = message; // Gán nội dung lỗi
            errorElement.classList.add('show'); // Hiển thị thông báo lỗi
        }

        // ==================== HÀM ẨN LỖI ====================
        /**
         * Ẩn thông báo lỗi khi input hợp lệ
         * @param {HTMLElement} input - Ô input
         * @param {HTMLElement} errorElement - Element hiển thị thông báo lỗi
         */
        function hideError(input, errorElement) {
            input.classList.remove('invalid'); // Xóa class 'invalid' để trả về viền bình thường
            errorElement.classList.remove('show'); // Ẩn thông báo lỗi
        }

        // ==================== VALIDATION KHI RỜI KHỎI Ô INPUT (BLUR EVENT) ====================
        // Khi user click ra ngoài ô input, sẽ tự động validate
        nameInput.addEventListener('blur', validateName); // Validate họ tên khi rời khỏi ô
        emailInput.addEventListener('blur', validateEmail); // Validate email khi rời khỏi ô
        passwordInput.addEventListener('blur', validatePassword); // Validate mật khẩu khi rời khỏi ô
        confirmPasswordInput.addEventListener('blur', validateConfirmPassword); // Validate xác nhận mật khẩu khi rời khỏi ô

        // ==================== VALIDATION KHI ĐANG NHẬP (INPUT EVENT) ====================
        // Nếu ô input đã có lỗi, sẽ validate lại ngay khi user đang gõ để cải thiện trải nghiệm
        
        // Validate họ tên khi đang gõ (nếu đã có lỗi trước đó)
        nameInput.addEventListener('input', function() {
            if (this.classList.contains('invalid')) { // Chỉ validate nếu đang có lỗi
                validateName();
            }
        });

        // Validate email khi đang gõ (nếu đã có lỗi trước đó)
        emailInput.addEventListener('input', function() {
            if (this.classList.contains('invalid')) { // Chỉ validate nếu đang có lỗi
                validateEmail();
            }
        });

        // Validate mật khẩu khi đang gõ (nếu đã có lỗi trước đó)
        passwordInput.addEventListener('input', function() {
            if (this.classList.contains('invalid')) { // Chỉ validate nếu đang có lỗi
                validatePassword();
            }
            // Nếu ô xác nhận mật khẩu đã có giá trị, validate lại luôn
            if (confirmPasswordInput.value !== '') {
                validateConfirmPassword();
            }
        });

        // Validate xác nhận mật khẩu khi đang gõ (nếu đã có lỗi trước đó)
        confirmPasswordInput.addEventListener('input', function() {
            if (this.classList.contains('invalid')) { // Chỉ validate nếu đang có lỗi
                validateConfirmPassword();
            }
        });

        // ==================== XỬ LÝ KHI SUBMIT FORM ====================
        /**
         * Khi user click nút "Đăng ký", sẽ validate toàn bộ form
         * Chỉ cho phép submit nếu tất cả các trường đều hợp lệ
         */
        form.addEventListener('submit', function(e) {
            e.preventDefault(); // Ngăn form submit mặc định
            
            // Validate tất cả các trường
            const isNameValid = validateName(); // Kiểm tra họ tên
            const isEmailValid = validateEmail(); // Kiểm tra email
            const isPasswordValid = validatePassword(); // Kiểm tra mật khẩu
            const isConfirmPasswordValid = validateConfirmPassword(); // Kiểm tra xác nhận mật khẩu
            
            // Nếu tất cả đều hợp lệ, cho phép submit form lên server
            if (isNameValid && isEmailValid && isPasswordValid && isConfirmPasswordValid) {
                form.submit(); // Gửi form lên server
            }
            // Nếu có lỗi, form sẽ không được submit và hiển thị lỗi cho user
        });
    </script>
</body>
</html>
