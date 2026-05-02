<?php

declare(strict_types=1);

namespace Common\App\UseCases\WebsiteContentSetting;

use Illuminate\Support\Facades\Storage;

/**
 * The use case class for getting the website content setting.
 */
class GetWebsiteContentSettingUseCase
{
    public function __invoke(): array
    {
        $dataFilePath = 'data/website_content_setting.json';

        if (Storage::exists($dataFilePath)) {
            $data = json_decode(Storage::get($dataFilePath), true);
            $data['avatar']['file_url'] = Storage::disk('public')->url($data['avatar']['file_path']);

            if (!isset($data['partner_logos'])) {
                $data['partner_logos'] = [];
            } else {
                foreach ($data['partner_logos'] as &$partnerLogo) {
                    $partnerLogo['file_url'] = Storage::disk('public')->url($partnerLogo['file_path']);
                }
            }
        } else {
            $data = [
                'phone_number' => '',
                'email' => '',
                'introduction_en' => '',
                'introduction_vi' => '',
                'avatar' => ['file_path' => '', 'file_url' => ''],
                'partner_logos' => [],
                'banner_text_en' => '',
                'banner_text_vi' => '',
            ];
        }

        return $data;
    }
}
