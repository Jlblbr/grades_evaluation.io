<div class="row g-0">
	<div class="col-lg-12 pe-lg-2">
		<div class="card">
			<div class="card-body">
				<div class="row g-3 flex-center justify-content-md-between">
					<div class="col-auto"></div>
					<div class="col-auto">
						<div class="text-center">
							<ul class="pagination page1-links">
							
								<?php
								$currentPage = $this->Paginator->params()['page'];
								$pageCount = $this->Paginator->params()['pageCount'];
								$ellipsisFlag = false;
								
								
								
								if ($this->Paginator->hasPrev()) {
									// You are not on the last page
									echo $this->Paginator->prev(
										'Prev',
										array(
											'class' => 'page-item',
											'escape' => false,
										),
										null,
										array(
											'class' => 'page-item next disabled',
											'escape' => false, // To allow the HTML code to be rendered.
										)
									);
								} else {
									// You are on the last page
									echo $this->Paginator->prev(
										'<a href="#" class="page-link">Prev</a>',
										array(
											'class' => 'page-item',
											'escape' => false,
										),
										null,
										array(
											'class' => 'page-item next disabled',
											'escape' => false, // To allow the HTML code to be rendered.
										)
									);
								}

								for ($i = 1; $i <= $this->Paginator->params()['pageCount']; $i++) {
									if ($i == $currentPage) {
										echo '<li class="page-item active"><a href="#" class="page-link">' . $i . '</a></li>';
									} elseif ($i < 5) {
										echo $this->Paginator->link($i, array('page' => $i), array('escape' => false, 'class' => 'page-link'));
									} elseif ($pageCount == $i) {
										echo $this->Paginator->link($i, array('page' => $i), array('escape' => false, 'class' => 'page-link'));
									} elseif ($pageCount != $i && $i > 5 && !$ellipsisFlag) {
										echo '<a class="btn btn-sm btn-falcon-default me-2" href="#!"> 
											<span class="fas fa-ellipsis-h"></span>
										</a>';
										$ellipsisFlag = true;
									}
								}
								
								if ($this->Paginator->hasNext()) {
									// You are not on the last page
									echo $this->Paginator->next(
										'Next',
										array(
											'class' => 'page-item next',
											'escape' => false,
										),
										null,
										array(
											'class' => 'page-item disabled',
											'escape' => false, // To allow the HTML code to be rendered.
										)
									);
								} else {
									// You are on the last page
									echo $this->Paginator->next(
										'<a href="#" class="page-link">Next</a>',
										array(
											'class' => 'page-item next',
											'escape' => false,
										),
										null,
										array(
											'class' => 'page-item disabled',
											'escape' => false, // To allow the HTML code to be rendered.
										)
									);
								}
								?>
							</ul>
						</div>
						
					</div>
					<div class="col-auto"></div>
				</div>
			</div>
		</div>
	</div>
	
</div>
