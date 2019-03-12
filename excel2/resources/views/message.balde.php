<!-- 成功提示框 -->
@if(Session::has('success'))
<div class="alert alert-success alert-dismissable" role="alert">
		<button type="button" class="close" date-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		<strong>成功！</strong>{{Session::get('success')}}
	</div>
</div>
@endif


<!-- 失败提示框 -->
@if(Session::has('error'))
<div class="alert alert-danger alert-dismissable" role="alert">
		<button type="button" class="close" date-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		<strong>失败！</strong>{{ Session::get('error') }}
	</div>
</div>
@endif