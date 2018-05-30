<div class="form-group">
    <div class="mdc-form-field">
        <strong>{{ str_replace('_', ' ', ucfirst($setting)) }}:</strong>
        <div class="mdc-radio">
            <input class="mdc-radio__native-control" type="radio" id="{{ $setting }}-1"
                   name="{{ $setting }}"
                   @if(auth()->user()->getSetting($setting)) checked @endif value="1">

            <div class="mdc-radio__background">
                <div class="mdc-radio__outer-circle"></div>
                <div class="mdc-radio__inner-circle"></div>
            </div>
        </div>
        <label for="show_planning_options_on_recipes_index-1" class="mb-0">Show</label>
        <div class="mdc-radio">
            <input class="mdc-radio__native-control" type="radio" id="show_planning_options_on_recipes_index-2"
                   name="{{ $setting }}"
                   @if(!auth()->user()->getSetting($setting))) checked @endif value="0">
            <div class="mdc-radio__background">
                <div class="mdc-radio__outer-circle"></div>
                <div class="mdc-radio__inner-circle"></div>
            </div>
        </div>
        <label for="{{ $setting }}-2" class="mb-0">Hide</label>
    </div>
</div>