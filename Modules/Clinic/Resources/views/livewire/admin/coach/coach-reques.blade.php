<div class="card col-12">
    <div class="card-header">درخواست های همکاری به عنوان کوچ</div>
    <div class="card-body table-responsive">
        <table class="table text-center table-bordered">
            <tr>
                <th>مشخصات</th>
                <th>تلفن</th>
                <th>توضیحات</th>
                <th>تغییر وضعیت</th>
                <th>حذف</th>
            </tr>
            @foreach($coachRequests as $coachRequest)
                <tr>
                    <td>{{$coachRequest->user->fname.' '.$coachRequest->user->lname}}</td>
                    <td>{{$coachRequest->user->tel}}</td>
                    <td class="text-right">{{$coachRequest->description}}</td>
                    <td></td>
                    <td></td>

                </tr>
            @endforeach
        </table>
    </div>

</div>
