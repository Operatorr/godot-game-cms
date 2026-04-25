<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\URL;

class VerifyEmailNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): Mailable
    {
        $verificationUrl = $this->verificationUrl($notifiable);

        return (new Mailable)
            ->to($notifiable->email)
            ->subject('Prove the Sigil — Verify Your Oath')
            ->html($this->buildEmailHtml($verificationUrl, $notifiable));
    }

    protected function verificationUrl(object $notifiable): string
    {
        return URL::temporarySignedRoute(
            'verification.verify',
            Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60)),
            [
                'id'   => $notifiable->getKey(),
                'hash' => sha1($notifiable->getEmailForVerification()),
            ]
        );
    }

    protected function buildEmailHtml(string $url, object $notifiable): string
    {
        $name = htmlspecialchars($notifiable->username ?? 'Warrior', ENT_QUOTES, 'UTF-8');

        return <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Prove the Sigil — Omega Realm</title>
  <!--[if mso]>
  <noscript>
    <xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch></o:OfficeDocumentSettings></xml>
  </noscript>
  <![endif]-->
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&family=Rajdhani:wght@400;500;600&display=swap');

    * { box-sizing: border-box; margin: 0; padding: 0; }

    body {
      background-color: #0D0D0F;
      font-family: 'Rajdhani', Arial, sans-serif;
      color: #E8E4DC;
      -webkit-font-smoothing: antialiased;
    }

    .wrapper {
      width: 100%;
      background-color: #0D0D0F;
      padding: 40px 16px;
    }

    .container {
      max-width: 560px;
      margin: 0 auto;
    }

    /* Header */
    .header {
      text-align: center;
      margin-bottom: 8px;
    }

    .logo-mark {
      display: inline-block;
      width: 48px;
      height: 48px;
      background-color: #6B1C1C;
      border-radius: 4px;
      line-height: 48px;
      text-align: center;
      margin-bottom: 12px;
    }

    .brand-name {
      font-family: 'Cinzel', Georgia, serif;
      font-size: 13px;
      font-weight: 600;
      letter-spacing: 0.4em;
      color: #9A7B4F;
      text-transform: uppercase;
    }

    /* Card */
    .card {
      position: relative;
      background-color: #1A1A1E;
      border: 1px solid rgba(107, 28, 28, 0.5);
      border-radius: 2px;
      margin-top: 24px;
      overflow: hidden;
    }

    .card-top-bar {
      height: 3px;
      background: linear-gradient(90deg, #4A1414, #6B1C1C, #9A7B4F, #6B1C1C, #4A1414);
    }

    .card-body {
      padding: 40px 40px 36px;
    }

    /* Eyebrow */
    .eyebrow {
      font-family: 'Cinzel', Georgia, serif;
      font-size: 10px;
      letter-spacing: 0.45em;
      color: #9A7B4F;
      text-transform: uppercase;
      text-align: center;
      margin-bottom: 16px;
    }

    /* Heading */
    .heading {
      font-family: 'Cinzel', Georgia, serif;
      font-size: 26px;
      font-weight: 700;
      color: #E8E4DC;
      text-align: center;
      letter-spacing: 0.12em;
      text-transform: uppercase;
      margin-bottom: 12px;
      text-shadow: 0 0 40px rgba(107, 28, 28, 0.6);
    }

    /* Divider */
    .divider {
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 16px 0 20px;
      gap: 12px;
    }

    .divider-line {
      height: 1px;
      width: 64px;
      background: linear-gradient(90deg, transparent, rgba(107, 28, 28, 0.7));
    }

    .divider-line-right {
      background: linear-gradient(270deg, transparent, rgba(107, 28, 28, 0.7));
    }

    .divider-sigil {
      color: #6B1C1C;
      font-size: 14px;
    }

    /* Body text */
    .body-text {
      font-family: 'Rajdhani', Arial, sans-serif;
      font-size: 15px;
      line-height: 1.7;
      color: rgba(232, 228, 220, 0.75);
      text-align: center;
      margin-bottom: 32px;
    }

    .body-text strong {
      color: #E8E4DC;
      font-weight: 600;
    }

    /* CTA Button */
    .cta-wrap {
      text-align: center;
      margin-bottom: 32px;
    }

    .cta-button {
      display: inline-block;
      padding: 14px 36px;
      background-color: #6B1C1C;
      color: #E8E4DC !important;
      font-family: 'Cinzel', Georgia, serif;
      font-size: 12px;
      font-weight: 600;
      letter-spacing: 0.3em;
      text-transform: uppercase;
      text-decoration: none;
      border-radius: 2px;
      border: 1px solid rgba(154, 123, 79, 0.4);
    }

    /* Expiry note */
    .expiry-note {
      font-size: 12px;
      color: rgba(232, 228, 220, 0.35);
      text-align: center;
      font-style: italic;
      margin-bottom: 28px;
    }

    /* Divider thin */
    .thin-divider {
      border: none;
      border-top: 1px solid rgba(107, 28, 28, 0.25);
      margin: 0 0 24px;
    }

    /* Fallback URL */
    .fallback-label {
      font-size: 11px;
      color: rgba(232, 228, 220, 0.35);
      text-align: center;
      letter-spacing: 0.1em;
      text-transform: uppercase;
      margin-bottom: 8px;
    }

    .fallback-url {
      font-size: 11px;
      color: #9A7B4F;
      text-align: center;
      word-break: break-all;
      line-height: 1.5;
    }

    /* Footer */
    .footer {
      text-align: center;
      margin-top: 28px;
      padding-bottom: 8px;
    }

    .footer-text {
      font-size: 11px;
      color: rgba(232, 228, 220, 0.2);
      font-style: italic;
      font-family: 'Rajdhani', Arial, sans-serif;
      letter-spacing: 0.05em;
    }

    .footer-brand {
      font-family: 'Cinzel', Georgia, serif;
      font-size: 10px;
      letter-spacing: 0.3em;
      color: rgba(154, 123, 79, 0.4);
      text-transform: uppercase;
      margin-top: 10px;
    }

    @media only screen and (max-width: 560px) {
      .card-body { padding: 28px 24px 24px; }
      .heading { font-size: 20px; }
    }
  </style>
</head>
<body>
  <div class="wrapper">
    <div class="container">

      <!-- Header -->
      <div class="header">
        <div class="logo-mark">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="#E8E4DC" stroke-width="2" style="display:inline-block;vertical-align:middle;">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/>
          </svg>
        </div>
        <div class="brand-name">Omega&nbsp;Realm</div>
      </div>

      <!-- Card -->
      <div class="card">
        <div class="card-top-bar"></div>
        <div class="card-body">

          <p class="eyebrow">The Final Rite</p>

          <h1 class="heading">Prove the Sigil</h1>

          <div class="divider">
            <div class="divider-line"></div>
            <span class="divider-sigil">&#10022;</span>
            <div class="divider-line divider-line-right"></div>
          </div>

          <p class="body-text">
            Heed this summons, <strong>{$name}</strong>.<br><br>
            A raven was dispatched the moment you swore your oath.
            Your sigil must be confirmed before the gates of the Omega Realm open before you.
            Press the seal below to bind your name to the ledger.
          </p>

          <div class="cta-wrap">
            <a href="{$url}" class="cta-button">&#9956;&nbsp;&nbsp;Confirm the Sigil&nbsp;&nbsp;&#9956;</a>
          </div>

          <p class="expiry-note">This seal will dissolve in 60 minutes. Do not tarry.</p>

          <hr class="thin-divider" />

          <p class="fallback-label">If the seal above fails, enter this rune manually:</p>
          <p class="fallback-url">{$url}</p>

        </div>
      </div>

      <!-- Footer -->
      <div class="footer">
        <p class="footer-text">"The void watches. The void waits. The void remembers."</p>
        <p class="footer-brand">Omega Realm &mdash; Do not reply to this missive</p>
      </div>

    </div>
  </div>
</body>
</html>
HTML;
    }
}
