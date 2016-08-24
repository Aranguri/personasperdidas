@extends ('layouts.home')

@section ('content')
<div class="ui container" id="privacy-container">
  @if (config('app.locale') == 'es')
    <h1>Política de privacidad de Personas Perdidas</h1>
    <p>Su privacidad es importante para nosotros. </p>
    <p>Es política de Personas Perdidas respetar su privacidad con respecto a cualquier información al tiempo de operar el sitio web. En consecuencia, hemos desarrollado esta política de privacidad para que entienda como recogemos, utilizamos, comunicamos, revelamos y hacemos uso de la información personal. Hemos esbozado nuestra política de privacidad a continuación. </p>
    <ul>
      <li>Se recopilará información personal por medios legítimos y justos y, en su caso, con el conocimiento o consentimiento de la persona en cuestión.</li>
      <li>Antes o en el momento de la recogida de información personal, identificaremos los fines para los que está siendo recopilada.</li>
      <li>Vamos a recoger y utilizar la información personal únicamente para cumplir con los fines especificados por nosotros y para otros fines auxiliares, a menos que se obtenga el consentimiento de la persona en cuestión o de lo requerido por la ley.</li>
      <li>Los datos personales deben ser pertinentes a los fines para los que se va a utilizar, y, en la medida necesaria para esos fines, debe ser precisa, completa y actualizada.</li>
      <li>Vamos a proteger la información personal mediante el uso de medidas de seguridad razonables contra pérdida o robo, así como el acceso no autorizado, revelación, copia, uso o modificación.</li>
      <li>Vamos a poner a disposición de los clientes información acerca de nuestras políticas y prácticas relativas a la gestión de información personal.</li>
      <li>Sólo se retendrá información personal durante el tiempo que sea necesario para el cumplimiento de dichos fines.</li>
    </ul>
    <p>Estamos comprometidos a llevar a cabo nuestra iniciativa de acuerdo a estos principios con el fin de garantizar que la confidencialidad de la información personal esté protegida y mantenida. Personas Perdidas puede cambiar esta política de privacidad de vez en cuando a criterio exclusivo de Personas Perdidas.</p>
  @else
    <h1>Personas Perdidas Privacy Policy</h1>
    <p>Your privacy is important to us.</p>
    <p>It is Personas Perdidas's policy to respect your privacy regarding any information we may collect while operating our website. Accordingly, we have developed this privacy policy in order for you to understand how we collect, use, communicate, disclose and otherwise make use of personal information. We have outlined our privacy policy below.</p>
    <ul>
      <li>We will collect personal information by lawful and fair means and, where appropriate, with the knowledge or consent of the individual concerned.</li>
      <li>Before or at the time of collecting personal information, we will identify the purposes for which information is being collected.</li>
      <li>We will collect and use personal information solely for fulfilling those purposes specified by us and for other ancillary purposes, unless we obtain the consent of the individual concerned or as required by law.</li>
      <li>Personal data should be relevant to the purposes for which it is to be used, and, to the extent necessary for those purposes, should be accurate, complete, and up-to-date.</li>
      <li>We will protect personal information by using reasonable security safeguards against loss or theft, as well as unauthorized access, disclosure, copying, use or modification.</li>
      <li>We will make readily available to customers information about our policies and practices relating to the management of personal information.</li>
      <li>We will only retain personal information for as long as necessary for the fulfilment of those purposes.</li>
    </ul>
    <p>We are committed to conducting our business in accordance with these principles in order to ensure that the confidentiality of personal information is protected and maintained. Personas Perdidas may change this privacy policy from time to time at Personas Perdidas's sole discretion.</p>
  @endif
</div>
@endsection