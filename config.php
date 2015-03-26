<div class="caldera-config-group">
	<label><?php echo __('Increment Start', 'cf-increment-capture'); ?> </label>
	<div class="caldera-config-field">
		{{#unless start}}
		<input class="block-input field-config required" type="number" name="{{_name}}[start]" value="{{start}}">
		<p><?php echo __('Number to start incrementing.', 'cf-increment-capture'); ?></p>
		{{else}}
		<p><?php echo __('Incremenets started at {{start}}. to reset, delete this and insert a new increment processor.', 'cf-increment-capture'); ?></p>
		<input class="block-input field-config required" type="hidden" name="{{_name}}[start]" value="{{start}}">
		{{/unless}}
	</div>
</div>
<div class="caldera-config-group">
	<label><?php echo __('Increment Field', 'cf-tourplan'); ?> </label>
	<div class="caldera-config-field">
		{{{_field slug="field" type="hidden" required="true"}}}
	</div>
</div>