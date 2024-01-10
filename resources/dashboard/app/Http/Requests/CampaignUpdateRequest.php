<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CampaignUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'explanation' => ['required', 'string', 'max:500'],
            'category' => ['required', 'string', 'regex:/(1|2)/'],
            'point' => ['required', 'integer', 'min:0', 'max:10000'],
            'activated' => ['required', 'date', 'after_or_equal:today'],
            'deactivated' => ['required', 'date', 'after_or_equal:period_start'],
            'thumbnail' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:1024'],
        ];
    }

    public function attributes()
    {
        return [
            'thumbnail' => 'サムネイル',
            'title' => 'タイトル',
            'explanation' => '内容',
            'category' => 'カテゴリー',
            'point' => 'ポイント',
            'activated' => '掲載開始日',
            'deactivated' => '掲載終了日',
        ];
    }

    public function messages()
    {
        return [
            'activated.after_or_equal' => ':Attributeには、本日または本日以降を日付を指定してください。',
            'deactivated.after_or_equal' => ':Attributeには、掲載開始日以降の日付を指定してください。',
            'category.regex' => ':Attributeは入力必須です。',
        ];
    }
}
