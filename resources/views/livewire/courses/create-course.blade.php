<div>
    <x-primary-button x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-create')">{{ __('Create Course') }}</x-primary-button>

    <x-modal name="confirm-user-create" :show="$errors->isNotEmpty()" focusable>
        <form wire:submit="createCourse" class="p-6">

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Create Course') }}
            </h2>

            <div class="mt-6">
                <x-input-label for="name" value="{{ __('Name') }}" class="" />

                <x-text-input wire:model="name" id="name" name="name" type="text" class="mt-1 block w-3/4"
                    placeholder="{{ __('Name') }}" />

                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="mt-6">
                <x-input-label for="description" value="{{ __('Description') }}" class="" />
                <div wire:ignore>
                    <x-text-input id="description" name="description" wire:model.defer="description"
                    placeholder="{{ __('Description') }}" autocomplete="description"></x-text-input>
                </div>
                <x-input-error :messages="$errors->get('description')" class="mt-2"/>
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-primary-button class="ms-3">
                    {{ __('Create Course') }}
                </x-primary-button>
            </div>
        </form>
    </x-modal>
</div>

@script
    <script>
        tinymce.init({
            selector: '#description',
            plugins: 'lists link image table code importcss',
            toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | code',
            valid_elements: '*[*]', 
            importcss_append: true,
            content_css: "/css/app.css",
            allow_conditional_comments: true,
            setup: function (editor) {
                editor.on('init change', function () {
                    editor.save();
                });
                editor.on('change', function (e) {
                    var content = tinymce.activeEditor.getContent();
                    @this.set('description', content);
                });
            }
        });
    </script>
@endscript