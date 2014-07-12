$(document).ready(function() {

	//Date Variables
	var d = new Date();
	var year = d.getFullYear();
	var month = d.getMonth()+1;
	var day = d.getDate();
	var hour = d.getHours();
	var minutes = d.getMinutes();

	var Sminute = minutes+10;
	var Fhour = hour+2;
	var Rhour = hour+3;

	$("#Syear").html("<option value='"+year+"'>"+year+"</option>");
	$("#Smonth").html("<option value='"+month+"'>"+month+"</option>");
	$("#Sday").html("<option value='"+day+"'>"+day+"</option>");
	$("#Shour").html("<option value='"+hour+"'>"+hour+"</option>");
	$("#Sminutes").html("<option value='"+Sminute+"'>"+Sminute+"</option>");

	$("#Fyear").html("<option value='"+year+"'>"+year+"</option>");
	$("#Fmonth").html("<option value='"+month+"'>"+month+"</option>");
	$("#Fday").html("<option value='"+day+"'>"+day+"</option>");
	$("#Fhour").html("<option value='"+Fhour+"'>"+Fhour+"</option>");
	$("#Fminutes").html("<option value='"+minutes+"'>"+minutes+"</option>");

	$("#Ryear").html("<option value='"+year+"'>"+year+"</option>");
	$("#Rmonth").html("<option value='"+month+"'>"+month+"</option>");
	$("#Rday").html("<option value='"+day+"'>"+day+"</option>");
	$("#Rhour").html("<option value='"+Rhour+"'>"+Rhour+"</option>");
	$("#Rminutes").html("<option value='"+minutes+"'>"+minutes+"</option>");

	$(".year").append("<option value='2013'>2013</option><option value='2012'>2012</option>");
	$(".month").append("<option value='12'>12</option><option value='11'>11</option><option value='10'>10</option><option value='9'>9</option><option value='8'>8</option><option value='7'>7</option><option value='6'>6</option><option value='5'>5</option><option value='4'>4</option><option value='3'>3</option><option value='2'>2</option><option value='1'>1</option>");
	$(".day").append("<option value='31'>31</option><option value='30'>30</option><option value='29'>29</option><option value='28'>28</option><option value='27'>27</option><option value='26'>26</option><option value='25'>25</option><option value='24'>24</option><option value='23'>23</option><option value='22'>22</option><option value='21'>21</option><option value='20'>20</option><option value='19'>19</option><option value='18'>18</option><option value='17'>17</option><option value='16'>16</option><option value='15'>15</option><option value='14'>14</option><option value='13'>13</option><option value='12'>12</option><option value='11'>11</option><option value='10'>10</option><option value='9'>9</option><option value='8'>8</option><option value='7'>7</option><option value='6'>6</option><option value='5'>5</option><option value='4'>4</option><option value='3'>3</option><option value='2'>2</option><option value='1'>1</option>");
	$(".hour").append("<option value='00'>00</option><option value='23'>23</option><option value='22'>22</option><option value='21'>21</option><option value='20'>20</option><option value='19'>19</option><option value='18'>18</option><option value='17'>17</option><option value='16'>16</option><option value='15'>15</option><option value='14'>14</option><option value='13'>13</option><option value='12'>12</option><option value='11'>11</option><option value='10'>10</option><option value='9'>9</option><option value='8'>8</option><option value='7'>7</option><option value='6'>6</option><option value='5'>5</option><option value='4'>4</option><option value='3'>3</option><option value='2'>2</option><option value='1'>1</option>");
	$(".minutes").append("<option value='59'>59</option><option value='58'>58</option><option value='57'>57</option><option value='56'>56</option><option value='55'>55</option><option value='54'>54</option><option value='53'>53</option><option value='52'>52</option><option value='51'>51</option><option value='50'>50</option><option value='49'>49</option><option value='48'>48</option><option value='47'>47</option><option value='46'>46</option><option value='45'>45</option><option value='44'>44</option><option value='43'>43</option><option value='42'>42</option><option value='41'>41</option><option value='40'>40</option><option value='39'>39</option><option value='38'>38</option><option value='37'>37</option><option value='36'>36</option><option value='35'>35</option><option value='34'>34</option><option value='33'>33</option><option value='32'>32</option><option value='31'>31</option><option value='30'>30</option><option value='29'>29</option><option value='28'>28</option><option value='27'>27</option><option value='26'>26</option><option value='25'>25</option><option value='24'>24</option><option value='23'>23</option><option value='22'>22</option><option value='21'>21</option><option value='20'>20</option><option value='19'>19</option><option value='18'>18</option><option value='17'>17</option><option value='16'>16</option><option value='15'>15</option><option value='14'>14</option><option value='13'>13</option><option value='12'>12</option><option value='11'>11</option><option value='10'>10</option><option value='9'>9</option><option value='8'>8</option><option value='7'>7</option><option value='6'>6</option><option value='5'>5</option><option value='4'>4</option><option value='3'>3</option><option value='2'>2</option><option value='1'>1</option>");


	$("#add").click(function() {
		$("div#book-content").append('<input type="text" class="form-control required" name="bookContent"><br>');
	});


	
	$("#make-book").click(function() {

		$(".required").each(function() {
		  if (($(this).val() === '') || ($(".required").val() === ''))
		  {
		    $("#make-book").attr("data-target","#Omissions");
		  }
		  else if ($(this).val() != '')
		  {
		  	$("#make-book").attr("data-target","#makeBook");
		  }
		});

	});


	$( "#result-select" )
	  .change(function() {
	    var str = "";
	    $( "#result-select option:selected" ).each(function() {
	      str += $( this ).val() + " ";
	    });
	    $('#change').text(str);
	  })
	  .trigger( "change" );



  //Read More
  $('.article').readmore({
	  maxHeight: 140
	});

});