@extends('admin.app')

@section('content')
<style>
.select2-container{display: block!important;}
</style>
<link href="{{URL::asset('metronic/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{URL::asset('metronic/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            @if(Auth::user()->access_level == 1)
            <a href="{{url()}}/sa">Home</a>
            <i class="fa fa-circle"></i>
            @else
            <a href="{{url()}}/user-dashboard">Home</a>
            <i class="fa fa-circle"></i>
            @endif
        </li>
        <li>
            @if(Auth::user()->access_level == 1)
            <a href="{{url()}}/companies">Companies</a>
            <i class="fa fa-circle"></i>
            @elseif(Auth::user()->access_level == 4)
            <a href="{{url('company/view')}}">Company</a>
            <i class="fa fa-circle"></i>
            @else
            <a href="{{url()}}/companies/{{$company->id}}">Companies</a>
            <i class="fa fa-circle"></i>
            @endif
        </li>
        <li>
            <a href="{{url()}}/companies/info/{{$company->id}}">Additional Information</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Add Category</span>
        </li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light form-fit bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-social-dribbble font-green"></i>
                    <span class="caption-subject font-green bold uppercase">Select Category</span>
                </div>
                <div class="actions">

                </div>
            </div>
            <div class="portlet-body form">
                <form method="post" action="{{url()}}/companies/info/categories/save/{{$company->id}}" class="form-horizontal form-row-seperated">
                    <div class="form-body">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="company_id" value="{{$company->id}}">
                        <div class="form-group">
                            <div class="col-md-7">
                                <select id="select2-button-addons-single-input-group-sm" name="company_categories[]" class="form-control col-md-12 js-data-category-ajax" multiple>
                                    @foreach($company->categories as $category)
                                        <option selected value="{{$category->category->id}}">{{$category->category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn btn-circle green">
                                    <i class="fa fa-check"></i> Submit</button>
                                <a href="{{url()}}/companies/info/{{$company->id}}" class="btn btn-circle grey-salsa btn-outline">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END PORTLET-->
    </div>
</div>
<script>
/* for show menu active */
$("#compnay-main-menu").addClass("active");
$('#compnay-main-menu' ).click();
$('#conpmay-menu-arrow').addClass('open');
/* end menu active */
function formatRepo(repo) {
    if (repo.loading) return repo.text;

    var markup = "<div class='select2-result-repository clearfix'>" +
        "<div class='select2-result-repository__meta'>" +
        "<div class='select2-result-repository__title'>" + repo.full_name +"</div>";
    
    markup += "</div></div>";

    return markup;
}

function formatRepoSelection(repo) {
    return repo.full_name || repo.text;
}
$(".js-data-category-ajax").select2({
    width: "off",
    ajax: {
        url: "{{url()}}/companies/info/category/search",
        dataType: 'json',
        delay: 250,
        data: function(params) {
            return {
                q: params.term, // search term
                page: params.page
            };
        },
        processResults: function(data, page) {
            // parse the results into the format expected by Select2.
            // since we are using custom formatting functions we do not need to
            // alter the remote JSON data
            return {
                results: data.items
            };
        },
        cache: true
    },
    escapeMarkup: function(markup) {
        return markup;
    }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: formatRepo,
    templateSelection: formatRepoSelection
});
</script>
<script src="{{URL::asset('metronic/plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
@endsection
