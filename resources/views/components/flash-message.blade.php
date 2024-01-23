@if(session()->has('message'))
    <div
        x-data="{show: true}"
        x-init="setTimeout(() => show=false, 3000)"
        x-show="show"
        class="bg-green-300 p-4 rounded-lg">
        <p>{{ session('message') }}</p>
    </div>
@endif
