<?php  
$whitelist = array( '127.0.0.1', '::1' );
// check if the server is in the array
if ( in_array( $_SERVER['REMOTE_ADDR'], $whitelist ) ) {
	$baseUrl = $this->Html->webroot;
} else {
	$baseUrl = 'https://church.infinityfreeapp.com/';
}
?>
<div id="wrapper">
    <!-- START CONTENT -->
    <div id="content">
        <!-- ===================================
          START THE HEADER
        ==================================== -->
        <header class="default heade-sticky">
            <div class="un-title-page go-back">
                <a href="app-pages.html" class="icon">
                    <i class="ri-arrow-drop-left-line"></i>
                </a>
                <h1></h1>
            </div>
        </header>
        <!-- ===================================
          START THE SPACE STICKY
        ==================================== -->
        <div class="space-sticky"></div>
        <!-- ===================================
          START THE FORM
        ==================================== -->
        <section class="account-section padding-20">
            <div class="display-title">
                <h1>activate the account!</h1>
                <p>Please enter the temporary code sent to your email <span
                        class="text-dark weight-500"><?php echo $contactNumber ?></span></p>
            </div>
            <div class="content__form margin-t-40">
                <form class="form-verification-code">
                    <div class="form-group">
                        <div class="input_group">
                            <input id="one" type="tel" maxlength="1" pattern="[0-9]" class="form-control" placeholder="-">
                            <input id="two" type="tel" maxlength="1" pattern="[0-9]" class="form-control" placeholder="-">
                            <input id="three" type="tel" maxlength="1" pattern="[0-9]" class="form-control" placeholder="-">
                            <input id="four" type="tel" maxlength="1" pattern="[0-9]" class="form-control" placeholder="-">
                            <input id="five" type="tel" maxlength="1" pattern="[0-9]" class="" placeholder="" 
                            style=" background: transparent; border: none; height:0px; width: 0px;">
                        </div>
                    </div>
                    <div class="countdown_code">
                        <p id="countdown" class="text_count"></p>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>

<script>
    var contact_number = '<?php echo $contactNumber ?>';
    var timeleft = 60;
    var downloadTimer = setInterval(function () {
        if (timeleft <= 0) {
            clearInterval(downloadTimer);
            document.getElementById("countdown").innerHTML = "<button type='button' class='btn btn-resend'>Resend Code</button>";
        } else {
            document.getElementById("countdown").innerHTML = "the remaining time " + timeleft + "s";
        }
        timeleft -= 1;
        /*console.log(downloadTimer);*/
    }, 1000);

    /*==================================
      START VERIFICATIOS CODE INPUT
    ==================================*/

    const form = document.querySelector('.form-verification-code')
    const inputs = form.querySelectorAll('input')
    const KEYBOARDS = {
        backspace: 8,
        arrowLeft: 37,
        arrowRight: 39,
    }

    function handleInput(e) {
        const input = e.target
        const nextInput = input.nextElementSibling
        if (nextInput && input.value) {
            nextInput.focus()
            if (nextInput.value) {
                nextInput.select()
            }
        }
    }

    function handlePaste(e) {
        e.preventDefault()
        const paste = e.clipboardData.getData('text')
        inputs.forEach((input, i) => {
            input.value = paste[i] || ''
        })
    }

    function handleBackspace(e) {
        const input = e.target
        if (input.value) {
            input.value = ''
            return
        }

        input.previousElementSibling.focus()
    }

    function handleArrowLeft(e) {
        const previousInput = e.target.previousElementSibling
        if (!previousInput) return
        previousInput.focus()
    }

    function handleArrowRight(e) {
        const nextInput = e.target.nextElementSibling
        if (!nextInput) return
        nextInput.focus()
    }

    form.addEventListener('input', handleInput)
    inputs[0].addEventListener('paste', handlePaste)

    inputs.forEach(input => {
        input.addEventListener('focus', e => {
            setTimeout(() => {
                e.target.select()
            }, 0)
        })

        input.addEventListener('keydown', e => {
            switch (e.keyCode) {
                case KEYBOARDS.backspace:
                    handleBackspace(e)
                    break
                case KEYBOARDS.arrowLeft:
                    handleArrowLeft(e)
                    break
                case KEYBOARDS.arrowRight:
                    handleArrowRight(e)
                    break
                default:
            }
        })
    })
</script>