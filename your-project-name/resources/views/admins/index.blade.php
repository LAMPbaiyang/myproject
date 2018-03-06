@extends('admins.parent')
@section('content')

        <!-- 内容区域 -->
    <div class="tpl-content-wrapper">

            <div class="container-fluid am-cf">
                <div class="row">
                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-9">
                        <center>
                            <div class="page-header-heading"><span class="am-icon-home page-header-heading-icon"></span> 欢迎您来到腾龙TV后台管理中心 </div>
                         </center>
                    </div>  
                </div>
            </div>
    </div>
   
    <script src="/houtai/js/amazeui.min.js"></script>
    <script src="/houtai/js/amazeui.datatables.min.js"></script>
    <script src="/houtai/js/dataTables.responsive.min.js"></script>
    <script src="/houtai/js/app.js"></script>
	@if (session('msg'))
	<script>
		alert("{{ session('msg') }}");
	</script>
	@endif
</body>

</html>
@endsection