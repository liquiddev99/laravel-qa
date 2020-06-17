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
							<div class="row">
								<div class="col-4">
									<div class="ml-auto">
										@can('update', $answer)
											<a href="{{ route('questions.answer.edit', [$question->id, $answer->id]) }}"
											   class="btn btn-sm btn-outline-info">Edit</a>
										@endcan
										{{--  @if(Auth::user()->can('delete', $question)) ... @endif--}}
										@can('delete', $answer)
											<form class="form-delete" action="{{ route('questions.answer.destroy', [$question->id, $answer->id]) }}"
											      method="post">
												@csrf
												@method('DELETE')
												<button type="submit" class="btn btn-sm btn-outline-danger"
												        onclick="return confirm('Are you sure?')">Delete
												</button>
											</form>
										@endcan
									</div>
								</div>
								<div class="col-4">

								</div>
								<div class="col-4">
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
					</div>
					<hr>
				@endforeach
			</div>
		</div>
	</div>
</div>
