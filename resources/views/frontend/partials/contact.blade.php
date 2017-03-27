<section id="contact">
    <div class="container flex-row">
        <div class="flex-left">

        </div>
        <div class="flex-right form">
            <form class="auth-form" id="contact-form" method="POST" action="/contact">
                <p class="error-message {{ (isset($error_bag) && $error_bag['error'] != '') ? 'error' : '' }}"></p>
                <section>
                    <div class="input-wrap text name">
                        <label for="name" class="tag txt-grey-darker">Name</label>
                        <input type="text" id="name" name="name" class="form-text required" />
                    </div>
                    <div class="input-wrap text phone">
                        <label for="phone" class="tag txt-grey-darker">Phone</label>
                        <input type="text" id="phone" name="phone" class="form-text" />
                    </div>
                    <div class="input-wrap text email">
                        <label for="email" class="tag txt-grey-darker">Email</label>
                        <input type="text" id="email" name="email" class="form-text" />
                    </div>
                    <div class="input-wrap textarea enquiry">
                        <label for="enquiry" class="tag txt-grey-darker">Enquiry</label>
                        <textarea type="text" id="enquiry" name="enquiry" class="form-textarea"></textarea>
                    </div>
                </section>

                <section class="form-footer">
                    <div class="input-wrap submit">
                        <button type="submit" class="form-submit disabled txt-white bg-red" name="submit">
                            <span class="tag text">Submit</span>
                            <span class="loading"></span>
                        </button>
                    </div>
                </section>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
</section>
<div id="confirmation" class="bg-white">
    <div class="inner">
        <div class="logo">
            <img src="/images/theme/logo.png" alt="logo" />
        </div>
        <div class="text font-medium">
            <p>Thanks for contacting Advanced Housing</p>
            <p>A member of our team will be in touch</p>
        </div>
        <a href="/" id="close-overlay">Return Home</a>
    </div>
</div>