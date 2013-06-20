@layout('master')

@section('nav')
	<li class="current"><a href="#userstuffwrapper">User Registration</a></li>
	<li><a href="#workcodestuffwrapper">Lesson Code Registration</a></li>
	<li><a href="#devicestuffwrapper">Device Registration</a></li>
@endsection

@section('main_section')
	        <div id="contentwrapper" class="contentwrapper">
			{{ $data = Session::get('data') }}
			@if(isset($data['error_message']))
				<<div class="notibar msgerror smallinput">
					<a class="close"></a>
					<p>{{ $data['error_message'] }} </p>
				</div>
			@elseif(isset($data['success_message']))
				<div class="notibar msgsuccess smallinput">
					<a class="close"></a>
					<p>{{ $data['success_message'] }}</p>
				</div>
			@endif
			<div id="userstuffwrapper" class="subcontent">
				   <div class="contenttitle2">
                        <h3>Pendaftaran User </h3>
                    </div><!--contenttitle-->					
            	
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
                                <option value="0">Common User</option>
                            </select></span>
                        </p>                       
                        
                        <p class="stdformbutton">
                        	<button class="submit radius2">Save User</button>
                            <input type="reset" class="reset radius2" value="Reset" />
                        </p>
                    </form>

            </div><!--subcontent-->
            
            <div id="workcodestuffwrapper" class="subcontent" style="display : none">
				   <div class="contenttitle2">
                        <h3>Pendaftaran Mata Kuliah </h3>
                    </div><!--contenttitle-->
            	
                    <form id="workcodeform" class="stdform" method="post" action="{{ URL::to_action('workcode@reg') }}">
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
			
			<div id="devicestuffwrapper" class="subcontent" style="display: none">
				   <div class="contenttitle2">
                        <h3>Pendaftaran Device </h3>
                    </div><!--contenttitle-->
                    <form id="deviceform" class="stdform" method="post" action="{{ URL::to_action('device@reg') }}">
                    	
                        <p>
                        	<label>no</label>
                            <span class="field"><input type="text" name="deviceno" id="deviceno" class="smallinput" /></span>
                        </p>
                        
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
@endsection