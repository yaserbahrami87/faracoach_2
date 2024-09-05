<div class="card p-3 text-right" dir="rtl">

    <div class="card-header">ارسال بازخورد {{$reserve->start_date}}</div>
    <div class="card-body">
        <form action="post" wire:submit.prevent="save">

            <div class="form-group">
                <label for="rate">امتیاز جلسه:<span class="text-danger">*</span></label>
                <select class="form-control" id="exampleFormControlSelect1" wire:model.lazy="rate">
                    <option selected value="NULL">انتخاب کنید</option>
                    <option value="1" {{($reserve->rate==1?'selected':'')}}>1</option>
                    <option value="2" {{($reserve->rate==2?'selected':'')}}>2</option>
                    <option value="3" {{($reserve->rate==3?'selected':'')}}>3</option>
                    <option value="4" {{($reserve->rate==4?'selected':'')}}>4</option>
                    <option value="5" {{($reserve->rate==5?'selected':'')}}>5</option>
                </select>
                @error('rate')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>


        <div class="form-group">
            <label for="comment">متن بازخورد:<span class="text-danger">*</span></label>
            <textarea class="form-control" id="comment" rows="3" wire:model.lazy="comment"></textarea>
            <small>این متن در بخش نظرات کوچ برای عموم نمایش داده خواهد شد.</small>
            @error('comment')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <button class="btn btn-outline-success" type="submit">ثبت بازخورد</button>
        </form>
    </div>
</div>
