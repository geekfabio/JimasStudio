@extends('layouts.admin')
@section('title', 'Conteúdo do site')
@section('content')
@php
$input = 'w-full px-4 py-2.5 rounded-lg bg-white border border-ink-200 text-ink-50 focus:border-gold-300 outline-none';
$sections = [
 'Hero da página inicial' => [
  ['home_hero_label','Etiqueta','text'], ['home_hero_title','Título principal','text'],
  ['home_hero_subtitle','Texto de apoio','rich'], ['home_hero_primary_text','Botão principal','text'],
  ['home_hero_secondary_text','Botão WhatsApp','text'], ['home_hero_image','Imagem de fundo','image']],
 'Secção Quem Somos' => [
  ['home_about_label','Etiqueta','text'], ['home_about_title','Título (vazio usa o título da página)','text'],
  ['home_about_text','Conteúdo (vazio usa a página Sobre Nós)','rich'], ['home_about_button','Texto do botão','text'],
  ['home_about_image','Imagem','image']],
 'Secção Serviços' => [
  ['home_services_label','Etiqueta','text'], ['home_services_title','Título','text'], ['home_services_text','Descrição','rich']],
 'Secção Portfólio' => [['home_portfolio_label','Etiqueta','text'], ['home_portfolio_title','Título','text']],
 'Secção Blog / Notícias' => [['home_news_label','Etiqueta','text'], ['home_news_title','Título','text'], ['home_news_fallback_image','Imagem padrão dos artigos','image']],
 'Chamada para acção' => [
  ['home_cta_label','Etiqueta','text'], ['home_cta_title','Título','text'], ['home_cta_text','Descrição','rich'],
  ['home_cta_button','Texto do botão','text']],
];
@endphp
<div class="mb-8">
 <h1 class="font-display font-bold text-3xl text-ink-50">Conteúdo e aparência</h1>
 <p class="text-ink-400 mt-2">Personalize cada área sem alterar a estrutura visual responsiva do site.</p>
</div>
<form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data" class="space-y-8">
 @csrf @method('PUT')
 <section class="bg-white border border-ink-200 rounded-xl p-6">
  <h2 class="font-display font-bold text-xl text-ink-50 mb-5">Marca e contacto</h2>
  <div class="grid md:grid-cols-2 gap-6">
   @foreach ([['site_logo','Logótipo','image'],['whatsapp_number','Número WhatsApp','text'],['whatsapp_message','Mensagem WhatsApp','text'],['site_email','Email','email'],['site_phone','Telefone','text'],['site_address','Endereço','text'],['facebook_url','Facebook','url'],['instagram_url','Instagram','url'],['linkedin_url','LinkedIn','url'],['tiktok_url','TikTok','url']] as [$key,$label,$type])
    <div class="{{ $key === 'site_address' ? 'md:col-span-2' : '' }}">
     <label class="block text-sm font-medium text-ink-500 mb-1">{{ $label }}</label>
     @if ($type === 'image')
      <input type="file" name="{{ $key }}" accept="image/*" class="{{ $input }}" />
      @if($settings[$key]) <img src="{{ asset('storage/'.$settings[$key]) }}" alt="Pré-visualização" class="h-16 mt-3 object-contain"> @endif
     @else <input type="{{ $type }}" name="{{ $key }}" value="{{ old($key,$settings[$key]) }}" class="{{ $input }}"> @endif
    </div>
   @endforeach
  </div>
 </section>
 @foreach($sections as $heading => $fields)
 <section class="bg-white border border-ink-200 rounded-xl p-6">
  <h2 class="font-display font-bold text-xl text-ink-50 mb-5">{{ $heading }}</h2>
  <div class="grid md:grid-cols-2 gap-6">
   @foreach($fields as [$key,$label,$type])
   <div class="{{ in_array($type,['rich','image']) ? 'md:col-span-2' : '' }}">
    <label class="block text-sm font-medium text-ink-500 mb-2">{{ $label }}</label>
    @if($type === 'rich')
     <input id="{{ $key }}" type="hidden" name="{{ $key }}" value="{{ old($key,$settings[$key]) }}"><trix-editor input="{{ $key }}" class="trix-content min-h-32 bg-white border border-ink-200 rounded-lg text-ink-50"></trix-editor>
    @elseif($type === 'image')
     <input type="file" name="{{ $key }}" accept="image/*" class="{{ $input }}">
     @if($settings[$key]) <img src="{{ asset('storage/'.$settings[$key]) }}" alt="Pré-visualização" class="h-36 mt-3 rounded-lg object-cover"> @endif
    @else <input type="text" name="{{ $key }}" value="{{ old($key,$settings[$key]) }}" class="{{ $input }}"> @endif
   </div>
   @endforeach
  </div>
 </section>
 @endforeach
 <section class="bg-white border border-ink-200 rounded-xl p-6">
  <h2 class="font-display font-bold text-xl text-ink-50 mb-5">SEO e partilha social</h2>
  <div class="grid md:grid-cols-2 gap-6">
   <div><label class="block text-sm font-medium text-ink-500 mb-1">Título SEO (até 70 caracteres)</label><input name="seo_title" maxlength="70" value="{{ old('seo_title',$settings['seo_title']) }}" class="{{ $input }}"></div>
   <div><label class="block text-sm font-medium text-ink-500 mb-1">Palavras-chave</label><input name="seo_keywords" value="{{ old('seo_keywords',$settings['seo_keywords']) }}" class="{{ $input }}"></div>
   <div class="md:col-span-2"><label class="block text-sm font-medium text-ink-500 mb-1">Descrição SEO (até 320 caracteres)</label><textarea name="seo_description" maxlength="320" rows="3" class="{{ $input }}">{{ old('seo_description',$settings['seo_description']) }}</textarea></div>
   <div class="md:col-span-2"><label class="block text-sm font-medium text-ink-500 mb-1">Imagem de partilha</label><input type="file" name="seo_image" accept="image/*" class="{{ $input }}">@if($settings['seo_image'])<img src="{{ asset('storage/'.$settings['seo_image']) }}" alt="" class="h-32 mt-3 rounded-lg object-cover">@endif</div>
  </div>
 </section>
 <div class="sticky bottom-4 flex justify-end"><button class="px-8 py-3 rounded-full bg-gold-300 hover:bg-gold-200 text-white font-semibold shadow-lg">Guardar todas as alterações</button></div>
</form>
@endsection
