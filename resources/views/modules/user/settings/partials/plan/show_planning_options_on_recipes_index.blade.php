<div class="form-group">
    <div class="mdc-form-field">
        <p>Planning options on recipes index</p>
        <div class="mdc-radio">
            <input class="mdc-radio__native-control" type="radio" id="show_planning_options_on_recipes_index-2"
                   name="show_planning_options_on_recipes_index"
                   @if(setting('show_planning_options_on_recipes_index', auth()->user()->id)) checked @endif value="1">
            <div class="mdc-radio__background">
                <div class="mdc-radio__outer-circle"></div>
                <div class="mdc-radio__inner-circle"></div>
            </div>
        </div>
        <label for="show_planning_options_on_recipes_index-1" class="mb-0">Show</label>
        <div class="mdc-radio">
            <input class="mdc-radio__native-control" type="radio" id="show_planning_options_on_recipes_index-2"
                   name="show_planning_options_on_recipes_index"
                   @if(!setting('show_planning_options_on_recipes_index', auth()->user()->id)) checked @endif value="0">
            <div class="mdc-radio__background">
                <div class="mdc-radio__outer-circle"></div>
                <div class="mdc-radio__inner-circle"></div>
            </div>
        </div>
        <label for="show_planning_options_on_recipes_index-2" class="mb-0">Hide</label>
    </div>
</div>