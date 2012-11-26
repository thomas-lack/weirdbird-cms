<p class="bottom-padding-10">
	<span class="sans-serif very-small uppercase dark-gray"><?= $category; ?></span>
</p>

<table class="tbl-fullwidth">
	<tr>
		<td>
			<h1>Category module selection</h1>
			<div id="articles-module-selection-grid">
				<!--<ul id="category-panelbar">
					<?
					/*$first = true;
					foreach($structures as $s) {
						
						// add panelbar headers
						if ($first) {
							echo '<li class="k-state-active">';
							echo '<span class="k-link k-state-selected">' . $s->title . '</span>';
							$first = false;
						}
						else {
							echo '<li>';
							echo $s->title;
						}
						
						// add content (modules selection, etc.)
						echo '<div style="padding:10px;">';
						foreach($layouts as $l) {
							if ($l->name == $s->layout) {
								for ($i = 0; $i < $l->columns; $i++) {
									echo '<p>';
									echo 'Module column ' . ($i+1) . ': ';
									// id of every selection is: "s<structure_id>_c<column_number>"
									echo '<select id="s' . $s->id . '_c' . $i . '" placeholder="Select module...">';
									foreach($modules as $m) {
										echo '<option ';
										foreach ($mappings as $map) {
											if ($map->structures_id == $s->id 
												&& $map->column == $i 
												&& $map->modules_id == $m_id)
												echo 'selected ';
										}
										echo 'value="' . $m->name . '">' . $m->description . '</option>';
									}
									echo '</select>';
									echo '</p>';
								}
							}
						}
						echo '<button class="k-button" id="save_' . $s->id . '">Save changes</button>';
						echo '</div>';
						echo '</li>';
					}*/
					?>
				</ul>-->

				<!-- structure selection block -->
				<p>
					<label for="structure">Structure: </label>
					<input id="structure">
				</p>

				<!-- column module selection block -->
				<div id="columnmoduleblock"></div>

			</div>
		</td>
		<td>
			<h1>Article editing</h1>
			<div id="articles-edit-grid"></div>
		</td>
	</tr>
</table>
