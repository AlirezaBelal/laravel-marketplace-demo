<!DOCTYPE html>
<html lang="fa">
<head>
    <livewire:admin.dashboard.head/>

    <script src="{{mix('/js/app.js')}}" defer></script>
</head>
<body>
@include('sweet::alert')
<livewire:admin.dashboard.sidebar/>
<div class="content">

    <livewire:admin.dashboard.header/>
    @include('livewire.admin.dashboard.breadcrumb')
    {{$slot}}
</div>
</body>
<livewire:admin.dashboard.footer/>

<script src="{{asset('/js/livewire-turbolinks.js')}}" data-turbolinks-eval="false" data-turbo-eval="false"></script>
</html>
<script>
    console.log(document.getElementById("copied2"));
    setTimeout(function (){
        if (document.getElementById("copied2")) {
            document.getElementById("copied2").classList.add("u-hidden");
            document.getElementById("copied").style = "display: block !important; ";
        }
    },3000)
</script>
