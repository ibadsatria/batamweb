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
	
	<div class="vernav2 iconmenu">
    	<ul>
        	<li><a href="{{ URL::to('user/')}}" class="widgets">Registration</a></li>            
			<li><a href="#editsub" class="buttons">Edit</a>
				<span class="arrow"></span>
            	<ul id="editsub">
               		<li><a href="{{ URL::to('user/view')}}">User List</a></li>
                    <li><a href="{{ URL::to('workcode/view')}}">Leson Code List</a></li>
                    <li><a href="{{ URL::to('device/view')}}">Device List</a></li>
                </ul>
			</li>
        </ul>
        <a class="togglemenu"></a>
        <br /><br />
    </div><!--leftmenu-->
	
	<div class="centercontent">
    
        <div class="pageheader">
            <h1 class="pagetitle">Device Related Stuff Registration</h1>
            <span class="pagedesc">Halaman untuk mendaftarkan user dan kode mata kuliah pada Mesin Absensi Politeknik Negeri Batam</span>
            
            <ul class="hornav">
                @yield('nav')
            </ul>
        </div><!--pageheader-->
        
		@yield('main_section')
        
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
<script type="text/javascript" src="{{ URL::to_asset('js/plugins/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::to_asset('js/custom/general.js') }}"></script>
<script type="text/javascript" src="{{ URL::to_asset('js/custom/forms.js') }}"></script>
<script type="text/javascript" src="{{ URL::to_asset('js/custom/tables.js') }}"></script>
</body>

</html>