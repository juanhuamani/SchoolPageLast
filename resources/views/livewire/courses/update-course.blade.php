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

<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Course Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update course information.") }}
        </p>
    </header>

    <form wire:submit="updateCourse" class="mt-6 space-y-6">
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input wire:model="name" id="name" name="name" type="text" class="mt-1 block w-full" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Description')" />
            <div wire:ignore>
                <x-text-input wire:model="description" id="description" name="description" type="text" class="mt-1 block w-full" required autocomplete="description" />
            </div>
            <x-input-error class="mt-2" :messages="$errors->get('description')" />
        </div>
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            <x-action-message class="me-3" on="profile-updated">
                {{ __('Saved.') }}
            </x-action-message>
        </div>
    </form>
</section>

