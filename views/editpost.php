<div class="addpost" onclick="showAddPostForm()"><i class="fa fa-pencil"></i></div>
					<div class='addpost-form' style="display: none">
					 	<input type="text" id="title" placeholder="*Тақырып" class="addpost-input" <?php echo "value='{$post['title']}'"; ?>>
					 	<textarea id="stxt" cols="30" rows="10" placeholder="*Қысқа текст" class="addpost-text" spellcheck="false"><?php echo $post['stxt']; ?></textarea>
					 	<div class="commands">
					      <div class="group-command">
					        <button onclick="execCmd('bold', this)" title="Қалың/жирный"><i class="fa fa-bold"></i></button>
					        <button onclick="execCmd('italic', this)" title="Курсив"><i class="fa fa-italic"></i></button>
					        <button onclick="execCmd('underline', this)" title="Асты сызылған/подчеркнутый"><i class="fa fa-underline"></i></button>
					        <button onclick="execCmd('strikeThrough', this)" title="Өшірілген"><i class="fa fa-strikethrough"></i></button>
					      </div>
					      <div class="group-command">
					        <button onclick="execCmd('justifyLeft', this)" title="Сол жаққа"><i class="fa fa-align-left"></i></button>
					        <button onclick="execCmd('justifyCenter', this)" title="Ортаға"><i class="fa fa-align-center"></i></button>
					        <button onclick="execCmd('justifyRight', this)" title="Оң жаққа"><i class="fa fa-align-right"></i></button>
					        <button onclick="execCmd('justifyFull', this)" title="Бастапты күй"><i class="fa fa-align-justify"></i></button>
					      </div>
					      <div class="group-command">
					        <button onclick="execCmd('cut')" title="Қыйу/Вырезать"><i class="fa fa-cut"></i></button>
					        <button onclick="execCmd('copy')" title="Қою/Вставить"><i class="fa fa-copy"></i></button>
					        <button onclick="execCmd('SelectAll')" title="Барлығын белгілеу/выделить все"><i class="fa fa-file-o"></i></button>
					      </div>
					      <div class="group-command">
					        <button onclick="execCmd('indent')" title="tab"><i class="fa fa-indent"></i></button>
					        <button onclick="execCmd('outdent')" title="shift+tab"><i class="fa fa-dedent"></i></button>
					      </div>
					      <div class="group-command">
					        <button onclick="execCmd('subscript', this)" title="Төменгі жол"><i class="fa fa-subscript"></i></button>
					        <button onclick="execCmd('superscript', this)" title="Жоғарғы жол"><i class="fa fa-superscript"></i></button>
					      </div>
					      <div class="group-command">
					        <button onclick="execCmd('undo')" title="бас тарту/отменить"><i class="fa fa-undo"></i></button>
					        <button onclick="execCmd('removeFormat')"><i class="fa fa-times"></i></button>
					        <button onclick="execCmd('redo')" title="қайтару/вернуть"><i class="fa fa-repeat"></i></button>
					      </div>
					      <div class="group-command">
					        <button onclick="execCmd('insertUnorderedList', this)" title="Реттелмеген тізім"><i class="fa fa-list-ul"></i></button>
					        <button onclick="execCmd('insertOrderedList', this)" title="Реттелген тізім"><i class="fa fa-list-ol"></i></button>
					        <button onclick="execCmd('insertHorizontalRule')" title="Горизонталь сызық/линия">hr</button>
					      </div>
					      
					      <div class="group-command">
					        <button onclick="execCmdArgument('createLink', prompt('Сілтеме:', ''))" title="Сілтеме қою"><i class="fa fa-link"></i></button>
					        <button onclick="execCmd('unlink')"><i class="fa fa-unlink"></i></button>
					        <button onclick="execCmdArgument('insertImage', prompt('Суретке сілтеме:', ''))" title="Сілтемены алу"><i class="fa fa-picture-o"></i></button>
					      </div>
					      <div class="group-command">
					        <button onclick="toggleSource(this)"><i class="fa fa-code" title="Бастапқы код/исходный код"></i></button>
					        <button onclick="toggleEdit(this)" title="Көру"><i class="fa fa-eye"></i></button>
					      </div>
					      <select onchange="execCmdArgument('formatBlock', this.value)">
					        <option>H</option>
					        <option value="h1">h1</option>
					        <option value="h2">h2</option>
					        <option value="h3">h3</option>
					        <option value="h4">h4</option>
					        <option value="h5">h5</option>
					        <option value="h6">h6</option>
					        <option value="P">Параграф</option>
					        <option value="pre">Код</option>
					      </select>
					      <select onchange="execCmdArgument('fontName', this.value)">
					        <option value="Times New Roman">Times New Roman</option>
					        <option value="Comic Sans MS">Comic Sans MS</option>
					        <option value="Courier">Courier</option>
					        <option value="Georgia">Georgia</option>
					        <option value="Tahoma">Tahoma</option>
					        <option value="Verdana">Verdana</option>
					        <option value="Arial">Arial</option>
					      </select>
					      <select onchange="execCmdArgument('fontSize', this.value)">
					        <option value="1">1</option>
					        <option value="2">2</option>
					        <option value="3">3</option>
					        <option value="4">4</option>
					        <option value="5">5</option>
					        <option value="6">6</option>
					      </select>
					      <input type="color" class="colorinput" onchange="execCmdArgument('foreColor', this.value)">
					      <input type="color" class="colorinput" onchange="execCmdArgument('hiliteColor', this.value)">
					    </div>
					    <div id="textField" contenteditable="true" placeholder="asa" data-text="*Толық текст" class="textField" spellcheck="false"><?php echo $post['ftxt']; ?></div>
    					<textarea id="ftxt"></textarea>
					 	<input type="text" id="uri" placeholder="*Uri: kak-sdelat-fotoshop" class="addpost-input" onchange="checkUri()" <?php echo "value='{$post['uri']}'"; ?>>
					 	<div id="validatorUri"></div>
					 	<input type="text" id="image" placeholder="Суретке сілтеме" class="addpost-input" <?php echo "value='{$post['image']}'"; ?>>
					 	<input type="text" id="alt" placeholder="*Суретке түсініктеме (alt)" class="addpost-input" style="background-color: #F0F0F0;"<?php echo "value='{$post['alt']}'"; ?>>
					 	<textarea id="desc" cols="30" rows="10" placeholder="*Сипаттама 170 сөз" class="addpost-text" spellcheck="false" style="background-color: #F0F0F0"><?php echo $post['desc']; ?></textarea>
					 	<input type="text" id="keys" placeholder="*15 кілтсөз фотошоп дизайн как сделать макет" class="addpost-input" style="background-color: #F0F0F0"<?php echo "value='{$post['keys']}'"; ?>>
					 	<input type="text" id="date" placeholder="*Дата" class="addpost-input" style="background-color: #F0F0F0"<?php echo "value='{$post['date']}'"; ?>>
					 	<input type="text" id="views" placeholder="*Көрілім" class="addpost-input" style="background-color: #F0F0F0"<?php echo "value='{$post['views']}'"; ?>>
					 	<input type="text" id="block" placeholder="*Блок" class="addpost-input" style="background-color: #F0F0F0"<?php echo "value='{$post['block']}'"; ?>>
					 	<input type="hidden" id="autor" <?php echo "value='{$username}'"; ?>>
					 	<input type="hidden" id="pid" <?php echo "value='$id'"; ?>>
					 	<input type="hidden" id="uid" <?php echo "value='$userid'"; ?>>
					 	<button onclick="editPost()">Өзгерту</button>
					 	<div id="errorodediting"></div>
					</div>
					<div class="addpost">
						<div id="deleteun">
						<?php 
							if ($post['block']==1) {
								echo "<span style='color: #00C21B' onclick='unDeletePost(".$id.")'><i class='fa fa-unlock-alt'></i>&nbsp;Бұғаттан шығару</span>";
							} else {
								echo "<span style='color: #C20000' onclick='deletePost(".$id.")'><i class='fa fa-lock'></i>&nbsp;Бұғаттау</span>";
							}
						 ?>
						</div>
						</div>
					<div id="erroroddeleting"></div>