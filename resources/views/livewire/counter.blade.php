<div>
    {{-- Do your work, then step back. --}}
    Count: {{ $count }}
    <button wire:click="increment(2)">Click</button>
{{--    <button wire:mouseenter="increment">Hover</button>--}}
{{--    <button wire:click.window="increment">Click anywhere</button>--}}
{{--    <button wire:click.throttle.500ms="increment">Click anywhere</button>--}}

{{--    <button wire:mouseenter="decrement">Decrement</button>--}}
{{--    <input wire:keydown.enter="decrement">--}}

{{--    <div wire:click.window="increment">Click anywhere</div>--}}
{{--    <div wire:keydown.window.escape="closeModal">Escape key</div>--}}

{{--    <input wire:model="name">--}}
{{--    <input type="number" wire:model="count">--}}
{{--    <button wire:click="decrement"></button>--}}

    <input type="number" wire:model.debounce.50ms="inputValue" placeholder="Nhập số để trừ">

{{--    <input wire:model.lazy="email">--}}
{{--    <input wire:model.debounce.500ms="search">--}}
{{--    <textarea wire:model.defer="description"></textarea>--}}

{{--    <form wire:submit.prevent="save">--}}
{{--        <input wire:model="title">--}}
{{--        <button type="submit">Save</button>--}}
{{--    </form>--}}

{{--    <button wire:click="loadData">Load</button>--}}
{{--    <span wire:loading>Đang tải...</span>--}}
{{--    <span wire:loading.remove>Hoàn tất</span>--}}

{{--    wire:init="loadData"	Gọi loadData khi component khởi tạo--}}
{{--    wire:poll	Tự động gọi lại component định kỳ--}}
{{--    wire:key="unique-id"	Giúp track phần tử khi lặp--}}
{{--    wire:ignore	Bỏ qua phần tử khỏi DOM diffing--}}
{{--    wire:dirty.class="bg-yellow"	Thêm class khi model thay đổi--}}
{{--    wire:click.prevent="action"	Ngăn chặn hành vi mặc định--}}
{{--    wire:click.stop="action"	Ngăn sự kiện lan truyền lên trên--}}

{{--    Gửi và nhận sự kiện giữa các component:--}}
{{--    <button wire:click="$emit('postAdded')">Emit Event</button>--}}

{{--    Trong component khác:--}}
{{--    protected $listeners = ['postAdded' => 'refreshPosts'];--}}
</div>
