<?php
/*
# mod_sp_quickcontact - Ajax based quick contact Module by JoomShaper.com
 OVERRIDE FOR DURATOOLS PRODUCT PAGE
*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

?>

<script type="text/javascript">
    (function ($) {
        $(document).ready(function () {

            preencheForm();
           // accordion();

        });
        //ACCORDION Form
        function accordion() {
            $('.produtos-show-form h3').click(function () {
                $('.duratools_sp_quickcontact').stop(true,true).slideToggle('normal');
            });
            $('.duratools_sp_quickcontact').hide();
        };

        function preencheForm() {
            var $pageProduct = $(".produtos-show");
            var $title = "Mais informação sobre" + " " + $(document).find("title").text();
            var $defaultMessage = "Boa tarde, estou interessado no produto " + $(document).find("title").text() + "e gostaria de obter mais informações. Envio o meu email para que possa ser posteriormente contactado. Agradeço a vossa atenção. Cumprimentos.";
            var callme, callme1;

            if($pageProduct.length > 0)
            {
                var $subject = $pageProduct.find("#subject");
                var $message = $pageProduct.find("#message");

                $subject.val($title);
                $message.val($defaultMessage);

                $subject.focus(function() {
                    callme = false;
                    $(this).val($title);

                })
                    .blur(function() {
                        callme = true;

                        setTimeout(function() {
                            if (callme) {
                                $(this).val($title);
                            }
                        }, 1);
                    });

                $message.focus(function() {
                    callme1 = false;
                    $(this).val($defaultMessage);
                })
                    .blur(function() {
                        callme1 = true;

                        setTimeout(function() {
                            if (callme1) {
                                $(this).val($defaultMessage);
                            }
                        }, 1);
                    });
            }

        }



    })(jQuery);
</script>

<div id="sp_quickcontact<?php echo $uniqid ?>" class="duratools_sp_quickcontact">
	<div id="sp_qc_status"></div>
	<form id="sp-quickcontact-form">
		<div class="linha">
			<input type="text" name="name" id="name" onfocus="if (this.value=='<?php echo $name_text ?>') this.value='';" onblur="if (this.value=='') this.value='<?php echo $name_text ?>';" value="<?php echo $name_text ?>" required />
			<input type="email" name="email" id="email" onfocus="if (this.value=='<?php echo $email_text ?>') this.value='';" onblur="if (this.value=='') this.value='<?php echo $email_text ?>';" value="<?php echo $email_text ?>" required />
		</div>
		<div class="linha">
			<input type="text" name="subject" id="subject" onfocus="" value="" />
		</div>
		<div class="linha">
			<textarea name="message" id="message" onfocus="if (this.value=='<?php echo $msg_text ?>') this.value='';" onblur="if (this.value=='') this.value='<?php echo $msg_text ?>';" cols="" rows=""><?php echo $msg_text ?></textarea>
            <div class="mandatory-message">
                <?=	JText::_("FORM_ALL_FIELDS_MANDATORY"); ?>
            </div>
		</div>
		<div class="linha">

			<div class="left">
				<?php if($formcaptcha) { ?>
					<input type="text" class="sccaptcha" name="sccaptcha" placeholder="<?php echo $captcha_question ?>" required />
				<?php } ?>
			</div>
			<div class="right">
				<input id="sp_qc_submit" class="button" type="submit" value="<?php echo $send_msg ?>" />
			</div>
			<div class="sp_qc_clr"></div>
		</div>
		<div class="sp_qc_clr"></div>
	</form>
</div>