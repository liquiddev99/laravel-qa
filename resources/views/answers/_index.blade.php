<div class="row mt-4">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<div class="card-title">
					<h2>{{ $answersCount . ' ' . Str::plural('Answer', $answersCount) }}</h2>
				</div>
				<hr>
				@include('layouts._message')
				@foreach($answers as $answer)
					<div class="media">
						<div class="d-flex flex-column votes-controls">
							<a href="" title="This answer is useful" class="vote-up">
								Vote up
							</a>
							<span class="votes-count">120</span>
							<a title="This answer is not useful" class="vote-down off">
								Vote down
							</a>
							<a title="Click to mark as favorite answer (Click again to undo)" class="favorite">
								Check
							</a>
						</div>
						<div class="media-body">
							{{ $answer->body }}
							<div class="float-right clearfix mt-5">
								<span class="text-muted">Answered {{ $answer->created_date }}</span>
								<div class="media mt-2">
									<a href="{{ $answer->user->url }}" class="pr-2">
										<img src="{{ $answer->user->avatar }}" alt="">
									</a>
									<div class="media-body mt-1">
										<a href="{{ $answer->user->url }}">{{ $answer->user->name }}</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<hr>
				@endforeach
			</div>
		</div>
	</div>
</div>
