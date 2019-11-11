<!DOCTYPE html>
<html xmlns="https://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<title></title>
	<meta http-equiv="content-type"
    	content="text/html;charset=utf-8" />
	<link rel="stylesheet" href="style.css" type="text/css" media="screen" charset="utf-8" />
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="description" content=""/>
	<meta name="keywords" content=""/>
<style type="text/css">
* {margin:0px;padding:0px;}
</style>
<script type="text/javascript" src="/latest/jquery.js"></script>
<script type="text/javascript" src="/latest/main.js"></script>
</head>
<body>
	
	<div class="content">
		
		<h2 class="slide">Getting Started</h2>
		
		<div class="slidecontent">
			
			<p>Make sure to clear your cache</p>
			
			<p>Please go over the notes/questions/comments below, but initially, I was hoping you could walk through claiming profile as if you are a user. See what makes sense and what needs to be change and give me feedback</p>
			
			<p>Here is the fake Credit Card Info to use:</p>
			
			<ul class="info">
				<li><span class="number">4242424242424242</span></li>
				<li>choose any future month and year</li>
				<li>choose any three numbers for security code</li>
			</ul>
			
			<h3>For you to do:</h3>
			
			<ul class="info">
				<li>Try to Claim a Free Profile</li>
				<li>Then upgrade it again to a Basic Profile</li>
				<li>Then upgrade it again to a premium theme.</li>
				<li>Create a new profile for basic and for premium</li>
			</ul>
			
		</div><!-- slidecontent -->
		
		<h2 class="slide">There are three levels of profiles</h2>
		
		<div class="slidecontent">
			
			<h3>Free Claim Profile</h3>
			
			<ul class="info">
				<li>Ability to change the name, slug, add email, create a user account, and upgrade if they choose.</li>
				<li>Also collects their personal info to up sell later</li>
				<li>No editing abilities beyond that, (these can change depending on what you want to do here)</li>
			</ul>
			
			<h3>Basic Profile</h3>
			
			<ul class="info">
				<li>Ability to change anything they want on the front end of the page</li>
				<li>Ability to Upgrade to premium </li>
			</ul>
			
			<h3>Premium Profile with advanced layout</h3>
			
			<ul class="info">
				<li>Additional content sections from Basic</li>
				<li>Ability to change anything they want on the front end of the page</li>
				<li>Also makes the profile a “featured post”. This adds the profile to the top of directory results.</li>
			</ul>
			
		</div><!-- slidecontent -->
		
		<h2 class="slide">Editing</h2>
		
		<div class="slidecontent">
			
			<p>Once you get to basic or premium profile levels (claim profile doesn’t have editing capabilities until they buy a subscription), there are front end editing capabilities.</p>
			
			<p>By hovering over any section on a profile and clicking on the edit icon, you are able to update right there. I did this because the backend of each post looks messy and could be confusing to users. This way is easy and fast.</p>
			
			<img class="f_img" src="/latest/images/f.jpg"/>
			
			<p>I also have some repeaters setup so they can add or take away case results, faqs, bar admission etc.</p>
			
			<img class="e_img" src="/latest/images/e.jpg"/>
			
			<p>On premium profiles, I also have areas where the user can disable entire sections if they decide to</p>
			
			<img class="d_img" src="/latest/images/d.jpg"/>
			
		</div><!-- slidecontent -->
		
		<h2 class="slide">Layout Notes</h2>
		
		<div class="slidecontent">
			
			<p>Post creation may take several seconds because 1. theres a lot of data to map, 2. It has to check  if there are any other posts with the same tile or terms, so it checks all 597,000 posts. But with the caching on, it seems to still be pretty fast. I made a processing screen for this:</p>
			
			<img class="c_img" src="/latest/images/c.jpg"/>
			
		</div><!-- slidecontent -->
		
		<h2 class="slide">Questions for you</h2>
		
		<div class="slidecontent">
			
			<p>1. How should we list out the PA Checkmarks when they are filling out the forms? I know you mentioned that you wanted to have to preset checkmarks so they don’t go creating their own. And also so we don’t have to list all the possibilities out. Which ones should we include?</p>
			
			<img class="b_img" src="/latest/images/b.jpg"/>
			
			<h3>Premium Layout Bios and Form</h3>
			
			<p>So we have a bunch of areas not listed on the premium form that are found in the template, and a bunch of areas listed on the premium form that aren't found on the template. See Below. Faqs could be the form questions.  There are also two bios on premium too, how should we handle that in the form inputs?</p>
			
			<p>I wasn’t sure where to map these types of questions below onto the premium template. There are several of them:</p>
			
			<img class="a_img" src="/latest/images/a.jpg"/>
			
			<img class="g_img" src="/latest/images/g.jpg"/>
			
			<p>Gravity forms doesn’t allow for repeatable input, so I have it set up to when they upgrade to premium, those repeatable layout areas will show up as lorem ipsum, then they can edit them right away through front facing acf form.</p>
			
		</div><!-- slidecontent -->
		
		<h2 class="slide">Issues and ongoing</h2>
		
		<div class="slidecontent">
			
			<h3>Siteground Cache</h3>
			
			<p>First off, the siteground cache is great bc some of the longer queries would normally take a little longer to process without it. But the cache is messing with logged in users. If you're logged in and you hit a cached page, you have to reload the page in order to see some of my logged in content (i.e.) username in header, front facing editing capabilities etc. I’m currently asking support if theres anything I can do. There are three levels of of caching and so I’m also experimenting with which ones are being overly aggressive. Maybe I can find a happy medium of caching preferences this way.</p>
			
			<p>So if you log in or out and are not seeing any user info of editing icons change, reload the page and the cookie will set. I will try and fix this.</p>
			
			<h3>Paypal Payments are buggy with post creation/update but Stripe works great:</h3>
			
			<p>I am having a few issues with Paypal Standard disrupting the post creation process. A few things break once the user is taken away from our site and onto paypal.</p>
			
			<ul class="info">
				<li>The posts get created/updated before a user’s card is processed.</li>
				<li>There is an option on paypal to create the post after the payment has cleared, however, paypal support said this can take anywhere from several minutes to a few hours for the IPN to clear the payment. This disrupts the whole process of having the post redirect immediately after paying.</li>
			</ul>
			
			<p>Here is what Paypal told me:</p>
			
			<p><i>“If you enable the setting on the PayPal feed it will delay the processing of the APC feed until PayPal sends an IPN message indicating the transaction was successful, which is usually within a few minutes or hours (depending on how busy the PayPal IPN server is) of the user being redirected back to your site from PayPal.” </i></p>

			
		</div><!-- slidecontent -->
		
	</div><!-- content -->
	
	
	
</body>
</html>