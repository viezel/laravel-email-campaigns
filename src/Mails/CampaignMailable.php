<?php

namespace Spatie\EmailCampaigns\Mails;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Spatie\EmailCampaigns\Actions\PersonalizeHtmlAction;
use Spatie\EmailCampaigns\Models\Campaign;
use Spatie\EmailCampaigns\Models\CampaignSend;
use Spatie\EmailCampaigns\Support\Config;

class CampaignMailable extends Mailable
{
    use SerializesModels;

    /** @var \Spatie\EmailCampaigns\Models\Campaign */
    public $campaign;

    /** @var \Spatie\EmailCampaigns\Models\CampaignSend */
    public $campaignSend;

    /** @var string */
    public $content;

    public function setCampaignSend(CampaignSend $campaignSend)
    {
        $this->campaignSend = $campaignSend;

        return $this;
    }

    public function setContent(string $content)
    {
        $this->content = $content;

        return $this;
    }

    public function build()
    {
        return $this
            ->subject($this->campaignSend->campaign->subject)
            ->view('email-campaigns::mails.campaign');
    }
}