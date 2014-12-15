					<form method="post" action="php/mailto.php" enctype="multipart/form-data" class="stretch-12">
							<label for="name">Name:</label>
							<input type="text" name="name" id="name" />

							<label for="email">E-mail:</label>
							<input type="text" name="email" id="email" />

							<label for="subject">Subject:</label>
							<input type="text" name="subject" id="subject"  />

							<label for="message">Message:&nbsp;</label>
							<textarea name="message" rows="10"></textarea>
						
							<label for="attachment">Attachment:&nbsp;</label>
							<input type="file" name="attachment"/>
						
						<input type="submit" value="Send" id="send"/>
					</form>