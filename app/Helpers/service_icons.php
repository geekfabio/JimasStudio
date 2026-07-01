<?php

if (! function_exists('service_icon_options')) {
    /**
     * Get the list of available service icon names.
     *
     * @return array<string, string>
     */
    function service_icon_options(): array
    {
        return [
            'megaphone' => 'Megafone (Marketing)',
            'chart-bar' => 'Gráfico (Análise)',
            'camera' => 'Câmara (Fotografia)',
            'video-camera' => 'Vídeo (Produção)',
            'microphone' => 'Microfone (Podcast)',
            'speaker-wave' => 'Som (Áudio)',
            'calendar' => 'Calendário (Eventos)',
            'paint-brush' => 'Pincel (Design)',
            'globe-alt' => 'Globo (Web/Digital)',
            'users' => 'Utilizadores (Comunidade)',
            'document-text' => 'Documento (Conteúdo)',
            'building-office' => 'Edifício (Corporativo)',
            'rocket-launch' => 'Foguetão (Lançamento)',
            'light-bulb' => 'Lâmpada (Ideias)',
            'envelope' => 'Email (Comunicação)',
            'device-phone-mobile' => 'Telemóvel (Mobile)',
            'shopping-bag' => 'Loja (E-commerce)',
            'truck' => 'Camião (Logística)',
            'heart' => 'Coração (Marca)',
            'star' => 'Estrela (Destaque)',
            'arrow-trending-up' => 'Crescimento',
        ];
    }
}
