<div class="p-3">
    <form method="post" wire:submit.prevent="changePassword">
        <div class="form-group">
            <label for="password">رمز عبور جدید:</label>
            <input type="password" class="form-control" id="password" name="password" wire:model.lazy="password">
            @error('password')
                <p class="text-danger" >
                    <strong>{{ $message }}</strong>
                </p>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">تکرار رمز عبور:</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" wire:model.lazy="password_confirmation">
            @error('password_confirmation')
                <p class="text-danger"  >
                    <strong>{{ $message }}</strong>
                </p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">بروزرسانی</button>
    </form>
</div>
