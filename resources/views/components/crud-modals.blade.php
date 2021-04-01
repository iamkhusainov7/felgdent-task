<x-modal-dialog modalId="create-{{$postfixId ?? 'item'}}" modalTitle="{{$createModalTitle}}">
    <x-slot name="modalBody">
    {{$createModalBody ?? ''}}
    </x-slot>
</x-modal-dialog>

<x-modal-dialog modalId="edit-{{$postfixId ?? 'item'}}" modalTitle="{{$editModalTitle}}">
    <x-slot name="modalBody">
        {{$editModalBody ?? ''}}
    </x-slot>
</x-modal-dialog>

<x-modal-dialog modalId="delete-{{$postfixId ?? 'item'}}" modalTitle="{{$deleteModalTitle}}" modalTitle="delete-item">
    <x-slot name="modalBody">
    {{$deleteModalBody ?? ''}}
    </x-slot>
</x-modal-dialog>
