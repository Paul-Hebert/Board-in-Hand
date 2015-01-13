					<?php 
						$protocol = strpos(strtolower($_SERVER['SERVER_PROTOCOL']),'https') === FALSE ? 'http' : 'https';
						$host     = $_SERVER['HTTP_HOST'];
						$script   = $_SERVER['SCRIPT_NAME'];
						 
						$currentUrl = $protocol . '://' . $host . $script . '?';

						echo '<form method="post" action="php/mailto.php?url=' . $currentUrl . '" enctype="multipart/form-data" class="stretch-12">';
					?>
							<label for="name">Name:</label>
							<input type="text" name="name" id="name" />

							<label for="email">E-mail:</label>
							<input type="email" name="email" id="email" />

							<label for="subject">Subject:</label>
							<input type="text" name="subject" id="subject"  />

							<label for="message">Message:&nbsp;</label>
							<textarea name="message" rows="10"></textarea>
						
							<label for="attachment">Attachment:&nbsp;</label>
							<div id="sizeError" class="error">Sorry this attachment is too large. You can only upload files up to one megabyte in file size.</div>
							<input type="file" name="attachment" id="attachment"/>
						
							<input type="submit" value="Send" class="send"/>
						</form>

					<?php
						if ($_GET['err'] == 'size'){
							echo '<script type="text/javascript">
									error("size","attachment");
							</script>';
						}
					?>