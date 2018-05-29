<div class="form-group">
    <div class="mdc-form-field">
        <strong>Plan in navbar:</strong>
        <div class="mdc-radio">
            <input class="mdc-radio__native-control" type="radio" id="radio-1" name="show_plan_in_navbar"
                   @if(auth()->user()->getSetting('show_plan_in_navbar')) checked @endif value="1">
            <div class="mdc-radio__background">
                <div class="mdc-radio__outer-circle"></div>
                <div class="mdc-radio__inner-circle"></div>
            </div>
        </div>
        <label for="radio-1" class="mb-0">Show</label>
        <div class="mdc-radio">
            <input class="mdc-radio__native-control" type="radio" id="radio-2" name="show_plan_in_navbar"
                   @if(!auth()->user()->getSetting('show_plan_in_navbar')) checked @endif value="0">
            <div class="mdc-radio__background">
                <div class="mdc-radio__outer-circle"></div>
                <div class="mdc-radio__inner-circle"></div>
            </div>
        </div>
        <label for="radio-2" class="mb-0">Hide</label>
    </div>
</div>