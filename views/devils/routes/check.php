<form class="formable" method="POST">
	<fieldset>
		<ul class="inlineLabels">
			<li class="ctrlHolder<?php if(isset($errors['route_id'])):?> errorField<?php endif;?>">
				<?php if(isset($errors['route_id'])): ?>
				<p class="errorMessage"><?php echo $errors['route_id']; ?></p>
				<?php endif; ?>
				<label for="route_id">
					Use these routes:
					<span class="fieldHint">Select all the routes that you want to test, use shift click to select multiples</span>
				</label>
				<select name="route_id[]" MULTIPLE="MULTIPLE">
					<!--<option value="">Test new one</option>-->
					<?php foreach($defined_routes as $route_id => $route): ?>
					<option value="<?php echo $route_id; ?>" <?php if(in_array($route_id, (array) $data['route_id'])):?>selected="selected"<?php endif; ?>>
						<?php echo $route_id,' - ',htmlspecialchars($route->uri);?>
					</option>
					<?php endforeach; ?>
				</select>
			</li>
		</ul>
	</fieldset>
	
	<fieldset>
		<ul class="inlineLabels">
			<li class="ctrlHolder">
				<?php if(isset($errors['tests'])): ?>
				<p class="errorMessage"><?php echo $errors['tests']; ?></p>
				<?php endif; ?>
				<label for="route_tests">Route Tests:<span class="fieldHint">Enter each test URI on a seperate line, enter a single '/' to test against an empty uri</span></label>
				<textarea id="route_tests" name="tests"><?php echo $data['tests']; ?></textarea>
			</li>			
		</ul>
	</fieldset>
	
	<div class="buttonHolder">
		<input type="submit" value="Route it!" />
	</div>
</form>

<?php if(count($results)): ?>
<h2>Results</h2>
<p>Here are your results</p>
<ul id="route-results">
	<?php foreach($results as $route => $tests): ?>
	<li class="route">
		<strong><?php echo $route; ?></strong>
		<ul class="tests">
		<?php foreach($tests as $test => $result): ?>
			<li class="test <?php echo $result['matched'] ? 'test-passed' : 'test-failed'; ?>">
				<div class="inner">
					<span class="uri"><?php echo $test;?></span>
					
					<?php if (count($result['params'])): ?>
					<dl class="params">
						<?php foreach($result['params'] as $param => $value): ?>
						<dt><?php echo $param; ?></dt>
						<dd><?php echo $value; ?></dt>
						<?php endforeach; ?>
					</dl>
					<?php endif; ?>
				</div>
			</li>
		<?php endforeach; ?>
		</ul>
	</li>
	<?php endforeach; ?>
</ul>
<?php endif; ?>

<?php //echo Kohana::debug(array_slice(get_defined_vars(), 2)); ?>