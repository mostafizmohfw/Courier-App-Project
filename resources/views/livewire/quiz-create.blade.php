<form wire:submit.prevent="formSubmit">
    @include('components.form-field', [
        'name' => 'name',
        'label' => 'Name',
        'type' => 'text',
        'placeholder' => 'Enter Quiz Name',
        'required' => 'required',
    ])

    @include('components.form-submit-btn', [
        'target' => 'formSubmit',
        'class' => 'lms-btn mt-4',
        'buttonText' => 'Create',
    ])
</form>
