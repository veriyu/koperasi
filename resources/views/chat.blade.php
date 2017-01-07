<link href="css/chat-style.css" rel="stylesheet">

<script src="http://js.pusher.com/1.12/pusher.min.js" type="text/javascript"></script> 

<script src="http://code.jquery.com/jquery-1.8.2.min.js" type="text/javascript"></script>

<script src="js/jquery.pusherchat.js" type="text/javascript"></script>

<script src="//js.pusher.com/3.2/pusher.min.js"></script>
  <div class="row">
    
  	<div id="pusherChat">

  		<div id="membersContent"> 

  			<span id="expand"><span class="close">&#x25BC;</span><span class="open">&#x25B2;</span></span>

  			<h2><span id="count">0</span> online</h2>

  			<div class="scroll">

  				<div id="members-list"></div>

  			</div>

  		</div>
  		<!-- chat box template -->

  		<div id="templateChatBox">

  			<div class="pusherChatBox">

  				<span class="state">

  					<span class="pencil">

  						<img src="assets/pencil.gif" />

  					</span>

  					<span class="quote">

  						<img src="assets/quote.gif" />

  					</span>

  				</span>

  				<span class="expand"><span class="close">&#x25BC;</span><span class="open">&#x25B2;</span></span>

  				<span class="closeBox">x</span>

  				<h2><a href="#" title="go to profile"><img src="" class="imgFriend" /></a> <span class="userName"></span></h2>

  				<div class="slider">

  					<div class="logMsg">

  						<div class="msgTxt">

  						</div>

  					</div>

  					<form method="post" name="#123">

  						<textarea  name="msg" rows="3" ></textarea>

  						<input type="hidden" name="from" class="from" />

  						<input type="hidden" name="to"  class="to"/>

  						<input type="hidden" name="typing"  class="typing" value="false"/>

  					</form>

  				</div>

  			</div>

  		</div>

  		<!-- chat box template end -->
  		<div class="chatBoxWrap">

  			<div class="chatBoxslide"></div>

  			<span id="slideLeft"> <img src="assets/quote.gif" />&#x25C0;</span> 

  			<span id="slideRight">&#x25B6; <img src="assets/quote.gif" /></span>

  		</div>

  	</div>

<script type="text/javascript">
$.fn.pusherChat({
                'pusherKey':'YOUR PUSHER KEY',  // required : open an account on http://pusher.com/ to get one
                'authPath':'server/pusher_auth.php', // required : path to authentication scripts more info at http://pusher.com/docs/authenticating_users
                'friendsList' : 'ajax/friends-list.json', // required : path to friends list json 
                'serverPath' : 'server/server.php' // required : path to server
            )}


</script>

