<?php ?>
<div>
    <h1>What Type of Date Are You? (Dude Edition)</h1>
</div>
<div class="questions">
    <p>1. You see a girl waiting at the bus stop. She is exactly your type. How do you get her number?</p>
    <form class="options">
        <input class="option" type="radio" name="question1" onclick="myradio();" value=4>You walk right up to her, strike up a conversation, and ask for her number<br>
        <input class="option" type="radio" name="question1" onclick="myradio();" value=3>You wait a few days until you get the courage to go and talk to her<br>
        <input class="option" type="radio" name="question1" onclick="myradio();" value=2>You tell one of your mutual friends that you like her<br>
        <input class="option" type="radio" name="question1" onclick="myradio();" value=1>You wait for her to come to you</br>
    </form>
</div>
<div class="questions">
    <p>2. You guys decide to go out on a date. Where do you decide to take her?</p>
    <form class="options">
        <input class="option" type="radio" name="question2" onclick="myradio();" value=4>You take her out for a short coffee and talk about life and relationships<br>
        <input class="option" type="radio" name="question2" onclick="myradio();" value=3>You take her out on a creative date and ask her questions about her life and you respond in kind, tried-and-true interview-style<br>
        <input class="option" type="radio" name="question2" onclick="myradio();" value=2>You take her out to a nice restaurant and dress in your best clothes. You ask the same questions as above<br>
        <input class="option" type="radio" name="question2" onclick="myradio();" value=1>You take her to the best restaurant and hope that your clothes does most of the talking. If not, you've got great stories to tell up your sleeves<br>
    </form>
</div>
<div class="questions">
    <p>3. You think you had a great first date. What do you do between now and your second date?</p>
    <form class="options">
        <input class="option" type="radio" name="question3" onclick="myradio();" value=4>You send her a text telling her you'll have out again soon. No big deal. Another date with another girl, coming up!<br>
        <input class="option" type="radio" name="question3" onclick="myradio();" value=3>You send her a text telling her how much fun you had and can't wait for the next date.<br>
        <input class="option" type="radio" name="question3" onclick="myradio();" value=2>In addition to doing above, you call her and ask her how she thinks the date went and when/where the next date is<br>
        <input class="option" type="radio" name="question3" onclick="myradio();" value=1>In addition to doing above, you think about how lucky you are for finally finding an amazing girl. You hope to start a relationship ASAP<br>
    </form>
</div>
<div class="questions">
    <p>4. Crap! You just remembered you have a huge project due this Friday. This might be a problem. How many dates do you have this week?</p>
    <form>
        <input class="option" type="radio" name="question4" onclick="myradio();" value=4>More than 5. You're going to have to cancel one of them.<br>
        <input class="option" type="radio" name="question4" onclick="myradio();" value=3>You have a few dates in the pipeline, just testing the waters. You can still make the dates<br>
        <input class="option" type="radio" name="question4" onclick="myradio();" value=2>You have one date because you're a one woman kind of guy<br>
        <input class="option" type="radio" name="question4" onclick="myradio();" value=1>You have one date. You don't date much, in general.<br>
    </form>
</div>
<div class="questions">
    <p>5. Finally, how spontaneous are you?</p>
    <form>
        <input class="option" type="radio" name="question5" onclick="myradio();" value=4>YOLO is your middle name. Your amusement > all else<br>
        <input class="option" type="radio" name="question5" onclick="myradio();" value=3>You may not be the most wild or crazy person, but you are definitely down for good times<br>
        <input class="option" type="radio" name="question5" onclick="myradio();" value=2>You like to have fun as much as the next guy, as long as things don't get too out of hand<br>
        <input class="option" type="radio" name="question5" onclick="myradio();" value=1>I like to plan ahead, no matter what the situation, work or play<br>
    </form>
</div>
    <br>
	<div class="final-msg"><span id="msg-thats-it"></span></div>
	<input type="button" id='previous' value="Previous"/>
    <input type="button" id='next' value="Next">
	<script
  src="https://code.jquery.com/jquery-1.12.4.min.js"
  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
  crossorigin="anonymous"></script>
<script>
  
/* jQuery(document).ready(function(){
answers = new Object();
jQuery('.option').change(function(){
    var answer = (jQuery(this).attr('value'))
    var question = (jQuery(this).attr('name'))
    answers[question] = answer
})
var item1 = document.getElementById('questions');

var totalQuestions = jQuery('.questions').size();
var currentQuestion = 0;
var questions = jQuery('.questions');
questions.hide();
jQuery(questions.get(currentQuestion)).fadeIn();
jQuery('#next').click(function(){
	alert(currentQuestion);
	//alert(totalQuestions);
    jQuery(questions.get(currentQuestion)).fadeOut(function(){
        currentQuestion = currentQuestion + 1;
        if(currentQuestion == totalQuestions){
               //var result = sum_values()
               //do stuff with the result
             //  alert(result);
        }else{
        jQuery(questions.get(currentQuestion)).fadeIn();
        }
    });

});

				jQuery('#previous').click(function(){
					alert(currentQuestion);
						jQuery(questions.get(currentQuestion)).fadeOut(function(){
							currentQuestion = currentQuestion - 1;
							//alert(currentQuestion);
							if(currentQuestion == 0){
								//jQuery('#previous').fadeOut();
								jQuery('#previous').attr('disabled',true);
								//jQuery(questions.get(currentQuestion)).fadeIn();
							}else{
							jQuery(questions.get(currentQuestion)).fadeIn();
							}
						});
						if(currentQuestion == totalQuestions){
								//jQuery('#previous').fadeOut();
								currentQuestion = currentQuestion - 1;
								jQuery(questions.get(currentQuestion)).fadeIn();
							}


					});
});
 */
 
 
 jQuery(document).ready(function(){
			answers = new Object();
			jQuery('.option').change(function(){
				var answer = (jQuery(this).attr('value'))
				var question = (jQuery(this).attr('name'))
				answers[question] = answer
				
			})
		
			var totalQuestions = jQuery('.questions').size();
			//alert(totalQuestions);
			var currentQuestion = 0;
			var questions = jQuery('.questions');
			questions.hide();
			jQuery(questions.get(currentQuestion)).fadeIn();
		
			//jQuery('#previous').fadeOut();
			/* if(currentQuestion == 0){
				jQuery('#previous').attr('disabled',true);
			}else{
				jQuery('#previous').prop('disabled', this.value == "" ? true : false); 
			} */
			
			jQuery('#next').prop('disabled',true);
			jQuery('#previous').prop('disabled',true);
			jQuery('#petname').keyup(function(){
				jQuery('#next').prop('disabled', this.value == "" ? true : false);     
			})
			
	//=================== Next Button Code===================//
			jQuery('#next').click(function(){
			jQuery('#next').prop('disabled',true);
			jQuery('#previous').prop('disabled', this.value == "" ? true : false);    
			var petName = jQuery('#petname').val();  // Pet name 
			if(petName!=''){
				jQuery(".petnameentered").html("<strong id='petnme'>&nbsp;" + petName + "</strong>");
			}
			
			
				jQuery(questions.get(currentQuestion)).fadeOut(function(){
					currentQuestion = currentQuestion + 1;
					if(currentQuestion == totalQuestions){
						   jQuery('#msg-thats-it').html("<b>That's It</b>");
						   jQuery('#next').prop('disabled',true);
						   jQuery('.actions-toolbar button').css("display","block");
						   
					}else{
						jQuery(questions.get(currentQuestion)).fadeIn();
						jQuery('#previous').fadeIn();
						jQuery('#next').fadeIn();
					}
				});

			});
	//==================Previous Button Code=========================//
				//alert(currentQuestion);
					jQuery('#previous').click(function(){
						alert(currentQuestion)
						jQuery(questions.get(currentQuestion)).fadeOut(function(){
							currentQuestion = currentQuestion - 1;
							//alert(currentQuestion);
							if(currentQuestion == 0){
								//jQuery('#previous').fadeOut();
								jQuery('#previous').attr('disabled',true);
								jQuery(questions.get(currentQuestion)).fadeIn();
							}else{
							jQuery(questions.get(currentQuestion)).fadeIn();
							}
						});
							if(currentQuestion == totalQuestions){
								//jQuery('#previous').fadeOut();
								currentQuestion = currentQuestion - 1;
								jQuery(questions.get(currentQuestion)).fadeIn();
							}

					});
				});
			});
	
	function myradio(){
		jQuery('#next').prop('disabled', this.value == "" ? true : false); 
	}

</script>