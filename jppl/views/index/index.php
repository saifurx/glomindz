<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>assets/apps/css/home_style.css">
<script type="text/javascript" src="<?php echo URL; ?>assets/apps/js/jquery.easing.1.3.js"></script>
<style>
    body {
        padding-bottom: 0;
        padding-top: 0;
        overflow-x: hidden;
    }
    .pad{
        height: 50px;
    }
    .container-fluid{
        padding-left: 0;
        padding-right: 0;
    }
</style>

<div class="container-fluid">
    <div class="section" id="section1">

        <div class="pad"></div>
        <h2>Publications</h2>
        
        <div data-configid="2234633/4203307" style="height: 400px;" class="span4 issuuembed"></div>
        <div data-configid="2234633/4203307" style="height: 400px;" class="span4 issuuembed"></div>


    </div>

    <div class="section" id="section4">
        <div class="pad"></div>
        <h2>About</h2>
        Launched in 2003, JANASADHARAN , an estimated and profound Assamese daily is in its 9 years of journey. Its mission is to bring into prominence the problems & prospects of this region into a domain of meaningful exchange.
        Presentation of news items is a testimony to this. With an impassioned skill of a surgeon, JANASADHARAN carefully avoids adding sensation to the surrounding environment thereby seeking to explore root cause of events; shaping course of lives of the participation.It is a platform for alternative viewpoints and a synthesizer of ideas.Instead of the traditional journalistic practice of straightforward reportage, JANASADHARAN presents a multiplicity of perspectives in a single article. This Assamese daily is ranked high among the readers for its well augmented & illustrated views.
    </div>
    <div class="section" id="section5">
        <div class="pad"></div>
        <h2>Contact</h2>
        <hr>
        <div class="row">
            <form method="POST"
                  action="<?php URL; ?>contact/send_contact_us_email">
                <label for="name">Name: <span class="required">*</span> </label> <input
                    class="input-xxlarge" type="text" id="name" name="name" value=""
                    placeholder="John Doe" required="" autofocus=""> <label
                    for="email">Email Address: <span class="required">*</span> </label>
                <input class="input-xxlarge" type="email" id="email" name="email"
                       value="" placeholder="johndoe@example.com" required=""> <label
                       for="telephone">Telephone: </label> <input class="input-xxlarge"
                       type="tel" id="telephone" name="tel" value=""> <label
                       for="message">Message: <span class="required">*</span> </label>
                <textarea class="input-xxlarge" id="message" name="message"
                          placeholder="Your message must be greater than 20 charcters"
                          required="" data-minlength="20"></textarea>
                <br>
                <span class="required">*</span> indicates a required field <br/><br/>

                <button type="submit"  class="btn btn-large btn-danger">Submit</button>
            </form>
        </div>
    </div>  
</div>   
<script type="text/javascript" src="//e.issuu.com/embed.js" async="true"></script>
<script type="text/javascript">
    $(function() {
        $('ul.nav a').bind('click', function(event) {
            var $anchor = $(this);
            $('html, body').stop().animate({
                scrollTop: $($anchor.attr('href')).offset().top
            }, 1500, 'easeInOutExpo');
            /*
             if you don't want to use the easing effects:
             $('html, body').stop().animate({
             scrollTop: $($anchor.attr('href')).offset().top
             }, 1000);
             */
            event.preventDefault();
        });
    });
</script>