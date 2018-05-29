<div class="form-group">
    <div class="mdc-form-field">
        <strong>Show plan on dashboard:</strong>
        <div class="mdc-radio">
            <input class="mdc-radio__native-control" type="radio" id="show_plan_on_dashboard-1" name="show_plan_on_dashboard"
                   @if(auth()->user()->getSetting('show_plan_on_dashboard')) checked @endif value="1">
            <div class="mdc-radio__background">
                <div class="mdc-radio__outer-circle"></div>
                <div class="mdc-radio__inner-circle"></div>
            </div>
        </div>
        <label for="show_plan_on_recipe_index-1" class="mb-0">Show</label>
        <div class="mdc-radio">
            <input class="mdc-radio__native-control" type="radio" id="show_plan_on_dashboard-2" name="show_plan_on_dashboard"
                   @if(!auth()->user()->getSetting('show_plan_on_dashboard')) checked @endif value="0">
            <div class="mdc-radio__background">
                <div class="mdc-radio__outer-circle"></div>
                <div class="mdc-radio__inner-circle"></div>
            </div>
        </div>
        <label for="show_plan_on_recipe_index-2" class="mb-0">Hide</label>
    </div>
</div>