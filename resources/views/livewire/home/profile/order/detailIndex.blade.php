@section('title')
    پروفایل -
    {{auth()->user()->name}}
@endsection
<section class="o-page__content">
    <div class="o-box">
        @include('livewire.home.profile.order.detail.top_detail')
        @include('livewire.home.profile.order.detail.returned')
        @include('livewire.home.profile.order.detail.list_item')
    </div>
</section>
