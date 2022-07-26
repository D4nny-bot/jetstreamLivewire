<div>
    <x-jet-danger-button wire:click="$set('open', true)"> {{-- es un metodo magico que recive como 1er para una variable y el 2do el valor --}}
        Crear nuevo post
    </x-jet-danger-button>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Crear nuevo post
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label value="Titulo del post" />
                <x-jet-input type="text" class="w-full" wire:model.defer="title"/>
                {{$title}}
            </div>
            
            <div class="mb-4">
                {{-- el parametro defer evita que se renderice cada cambie en cualquier conponente --}}
                <x-jet-label value="Contenido del post" />
                <textarea class="form-control w-full" rows="6" wire:model.defer="content"></textarea>
                {{$content}}
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open', false)">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click="save">
                Crear post
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
