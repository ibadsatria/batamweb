<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Batam-Management</title>

{{ HTML::style('css/style.default.css')}}

<!--[if IE 9]>
    <link rel="stylesheet" media="screen" href="css/style.ie9.css"/>
<![endif]-->
<!--[if IE 8]>
    <link rel="stylesheet" media="screen" href="css/style.ie8.css"/>
<![endif]-->
<!--[if lt IE 9]>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
</head>

<body class="withvernav">

<div class="bodywrapper">

	<div class="centercontent">
    
        <div class="pageheader">
            <h1 class="pagetitle">Device Related Stuff Registration</h1>
            <span class="pagedesc">Halaman untuk mendaftarkan user dan kode mata kuliah pada Mesin Absensi Politeknik Negeri Batam</span>
            
            <ul class="hornav">
                <li class="current"><a href="#userstuffwrapper">User Registration</a></li>
                <li><a href="#workcodestuffwrapper">Lesson Code Registration</a></li>
                <li><a href="#devicestuffwrapper">Device Registration</a></li>
            </ul>
        </div><!--pageheader-->
        
        <div id="contentwrapper" class="contentwrapper">
			<div id="userstuffwrapper" class="subcontent">
				   <div class="contenttitle2">
                        <h3>Pendaftaran User </h3>
                    </div><!--contenttitle-->
					
					@if(isset($error_message))
						<<div class="notibar msgerror smallinput">
							<a class="close"></a>
							<p>{{ $error_message }} </p>
						</div>
					@elseif(isset($success_message))
						<div class="notibar msgsuccess smallinput">
							<a class="close"></a>
							<p>{{ $success_message }}</p>
						</div>
					@endif
            	
                    <form id="userform" class="stdform" method="post" action="{{ URL::to_action('user@reg') }}">
                    	<p>
                        	<label>User ID</label>
                            <span class="field"><input type="text" name="userid" id="userid" class="smallinput" /></span>
                        </p>
                        
                        <p>
                        	<label>Full Name</label>
                            <span class="field"><input type="text" name="fullname" id="fullname" class="smallinput" /></span>
                        </p>
                        
                        <p>
                        	<label>Card Serial Number</label>
                            <span class="field"><input type="text" name="csn" id="csn" class="smallinput" /></span>
                        </p>
                        
                        <p>
                        	<label>Password</label>
                            <span class="field"><input type="password" name="password" id="password" class="smallinput password" /></span>
                        </p>
						
						<p>
                        	<label>Re-type Password</label>
                            <span class="field"><input type="password" name="password2" id="password2" class="smallinput password" /></span>
                        </p>
						
						<p>
                            <span class="formwrapper">
                            	<input type="checkbox" name="isactive" /> Active<br />
                            </span>
						</p>
                        
                        <p>
                        	<label>Privildge</label>
                            <span class="field"><select name="priviledge" id="selection2">
                            	<option value="0">Choose One</option>
                                <option value="1">Administrator</option>
                                <option value="0">User</option>
                            </select></span>
                        </p>                       
                        
                        <p class="stdformbutton">
                        	<button class="submit radius2">Save User</button>
                            <input type="reset" class="reset radius2" value="Reset" />
                        </p>
                    </form>

            </div><!--subcontent-->
            
            <div id="workcodestuffwrapper" class="subcontent">
				   <div class="contenttitle2">
                        <h3>Pendaftaran Mata Kuliah </h3>
                    </div><!--contenttitle-->
            	
                    <form id="workcodeform" class="stdform" method="post" action="http://localhost/batamweb/public#devicestuffwrapper">
                    	<p>
                        	<label>id</label>
                            <span class="field"><input type="text" name="workcodeid" id="workcodeid" class="smallinput" /></span>
                        </p>
                        
                        <p>
                        	<label>Lesson Code Prefix (i.e IF, MA, or EL)</label>
                            <span class="field"><input type="text" name="workcode" id="workcode" class="smallinput" /></span>
                        </p>
                       
                        <p>
                        	<label>Remarks (deskripsi)</label>
                            <span class="field"><textarea cols="80" rows="5" name="remarks" class="smallinput" id="remarks"></textarea></span> 
                        </p>
                        <br />
                        
                        <p class="stdformbutton">
                        	<button class="submit radius2">Save Lesson Code</button>
                            <input type="reset" class="reset radius2" value="Reset" />
                        </p>
                    </form>

            </div><!--subcontent-->
			
			<div id="devicestuffwrapper" class="subcontent">
				   <div class="contenttitle2">
                        <h3>Pendaftaran Device </h3>
                    </div><!--contenttitle-->
					
					@if(isset($error_message))
						<<div class="notibar msgerror">
							<a class="close"></a>
							<p>{{ $error_message }} </p>
						</div>
					@elseif(isset($success_message))
						<div class="notibar msgsuccess">
							<a class="close"></a>
							<p>{{ $success_message }}</p>
						</div>
					@endif
            	
                    <form id="deviceform" class="stdform" method="post" action="#">
                    	
                        <p>
                        	<label>IP</label>
                            <span class="field"><input type="text" name="ip" id="ip" class="smallinput" /></span>
                        </p>
                        
                        <p>
                        	<label>Port</label>
                            <span class="field"><input type="text" name="port" id="port" class="smallinput" value="4730" /></span>
                        </p>           
                        
                        <p class="stdformbutton">
                        	<button class="submit radius2">Save Device Config</button>
                            <input type="reset" class="reset radius2" value="Reset" />
                        </p>
                    </form>

            </div><!--subcontent-->
        
        </div><!--contentwrapper-->
        
	</div><!-- centercontent -->
    
    
</div><!--bodywrapper-->


<script type="text/javascript" src="{{ URL::to_asset('js/plugins/jquery-1.7.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::to_asset('js/plugins/jquery-ui-1.8.16.custom.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::to_asset('js/plugins/jquery.cookie.js') }}"></script>
<script type="text/javascript" src="{{ URL::to_asset('js/plugins/jquery.uniform.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::to_asset('js/plugins/jquery.validate.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::to_asset('js/plugins/jquery.tagsinput.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::to_asset('js/plugins/charCount.js') }}"></script>
<script type="text/javascript" src="{{ URL::to_asset('js/plugins/ui.spinner.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::to_asset('js/custom/general.js') }}"></script>
<script type="text/javascript" src="{{ URL::to_asset('js/custom/forms.js') }}"></script>
</body>

</html>