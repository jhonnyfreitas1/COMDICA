@extends('layouts.admin')


	@section('area-principal')

				<div class="row container" style="width: 40vh;">
	                <div id="poll-div" class="col-md-12 col-12 col-lg-12">

	                    <?=($lava->render('DonutChart', 'IMDB', 'poll-div'))?>

	                </div>
				</div>

			</div>
		</div>

	@endsection
