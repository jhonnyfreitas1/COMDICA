(function($) {
  $(document).ready(function() {

    var dataToPost = {}
    var result = {}

    var prettyCurrency = function(num) {
        var n = 2,
            x = 3,
            s = '.',
            c = ',';

        var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\D' : '$') + ')',
            num = num.toFixed(Math.max(0, ~~n));

        return (c ? num.replace('.', c) : num).replace(new RegExp(re, 'g'), '$&' + (s || ','));
    }

    var sanitizeCurrency = function (input) {
      return input.maskMoney('unmasked')[0]
    }

    var addErrorClass = function (input) {
      input.parent().addClass('invalid')
    }

    var getINSS = function(rendaBruta, type) {
      var tableINSS = window.BP_INSS_TABLE
      var contribINSS = 0

      if (type === 'anual') {
        rendaBruta = Math.round((rendaBruta / 12) * 100) / 100
      }

      var tetoMaximo = tableINSS.reduce(function(max, item) {
        return item.vlMaxInss > max ? item.vlMaxInss : max
      }, tableINSS[0].vlMaxInss)

      var faixa = tableINSS.reduce(function(faixaInicial, item) {
        var MIN = (item.vlMinInss === null) ? 0 : item.vlMinInss
        var MAX = (item.vlMaxInss === null) ? 0 : item.vlMaxInss
        var FAIXA = (FAIXA > faixaInicial) ? FAIXA : faixaInicial
        
        if (rendaBruta >= MIN && rendaBruta <= MAX) {
          FAIXA = item.vlPercentPagInss
        }

        if (rendaBruta > tetoMaximo) {
          FAIXA = 0
        }
        
        return FAIXA
      }, tableINSS[0].vlPercentPagInss)

      var contribuicaoInss = function(faixa) {
        var calculo = (rendaBruta * (faixa / 100)) * 12

        if (faixa === 0) {
          calculo = 621.038 * 12
        }
        
        return calculo
      }

      contribINSS = contribuicaoInss(faixa)
      contribINSS = parseFloat(contribINSS.toFixed(2))

      return contribINSS
    }

    var setINSS = function() {
      var rendaBrutaValue = sanitizeCurrency($('.simulador-input[name="rendaBruta"]'))
      var inputINSS = $('.simulador-input[name="inss"]')
      var tipoRenda = $('.simulador-input[name="tipoRenda"]').val()

      inputINSS.val('R$ ' + prettyCurrency(getINSS(rendaBrutaValue, tipoRenda)))
      inputINSS.parent().removeClass('invalid')
    }

    var sendData = function (data) {
      data['action'] = 'ajax_simulator'
      initButtonAnimation()

      $.ajax({
        url: ajaxurl,
        type: 'POST',
        data: data,
        success: function (res) {
          result = JSON.parse(res)
          if (result.status === 'PROCESSED') {
            showResult()
            stopButtonAnimation()
            $('.button-wrapper').css('max-width', '100%')
          }
        },
        error: function(err) {
          console.log('Error:', err)
        }
      })
    }

    var keyToLabel = function(key) {
      var label = '';

      switch (key) {
        case 'rendimentoAnual':
          label = 'Rendimento anual'
          break;
        case 'deducaoDependente':
          label = 'Dedução com dependentes'
          break;
        case 'despesaMedica':
          label = 'Despesas médicas'
          break;
        case 'despesaEnsino':
          label = 'Despesas com ensino'
          break;
        case 'previdenciaSocialInss':
          label = 'Previdência social (INSS)'
          break;
        case 'despesaPensao':
          label = 'Pensão alimentícia'
          break;
        case 'planoBP':
          label = 'Investimento anual em Planos Brasilprev'
          break;
        case 'baseCalculo':
          label = 'Nova base de cálculos'
          break;
        case 'impostoRenda':
          label = 'Imposto de Renda'
          break;
        case 'parcelaDeduzir':
          label = '(-) Parcela a deduzir'
          break;
        case 'impostoDevido':
          label = '(=) Imposto devido'
          break;
        case 'irFonte':
          label = '(-) IR retido na fonte'
          break;
        case 'impostoPagar':
          label = '(=) Imposto a pagar'
          break;
        case 'beneficioFiscal':
          label = 'Benefício fiscal'
          break;
        default:
          label = label
      }

      return label
    }

    var showDesktopResult = function() {
      var resultDesktopFixed = ''
      var resultDesktopBase = ''

      var tableLabelsFixed = [
        'rendimentoAnual',
        'deducaoDependente',
        'despesaMedica',
        'despesaEnsino',
        'previdenciaSocialInss',
        'despesaPensao'
      ]

      var tableLabelsBase = [
        'planoBP',
        'baseCalculo',
        'impostoRenda',
        'parcelaDeduzir',
        'impostoDevido',
        'irFonte',
        'impostoPagar',
        'beneficioFiscal'
      ]

      tableLabelsFixed.map(function(item) {
        resultDesktopFixed += '<div class="row ' + item + '"><p class="tiny">' + keyToLabel(item) + '</p><p class="tiny">' + prettyCurrency(result.data[item]) + '</p><p class="tiny">' + prettyCurrency(result.data[item]) + '</p><p class="tiny">' + prettyCurrency(result.data[item]) + '</p></div>'
      })

      tableLabelsBase.map(function(item) {
        resultDesktopBase += '<div class="' + (item === 'beneficioFiscal' ? 'index index-footer' : 'row ' + item) + '"><p class="tiny">' + keyToLabel(item) + '</p><p class="tiny">' + prettyCurrency(result.data[item].simulacao) + '</p><p class="tiny">' + prettyCurrency(result.data[item].semPlano) + '</p><p class="tiny">' + prettyCurrency(result.data[item].beneficioMaximo) + '</p></div>'
      })

      $('.table-result__fixed').html(resultDesktopFixed)
      $('.table-result__base').html(resultDesktopBase)

      checkBeneficioFiscal()
      showAlert()
    }

    var showMobileResult = function() {
      var tableLabels = [
        'planoBP',
        'baseCalculo',
        'impostoRenda',
        'parcelaDeduzir',
        'impostoDevido',
        'irFonte',
        'impostoPagar',
        'beneficioFiscal'
      ]

      var getTable = function(key) {
        var res = ''

        tableLabels.map(function(item) {
          res += '<ul class="' + (item === 'beneficioFiscal' ? 'row row-summary' : 'row ' + item) + '"><li>' + keyToLabel(item) + '</li><li>' + prettyCurrency(result.data[item][key]) + '</li></ul>'
        })

        return res
      }

      $('.table-mobile__simulacao').html(getTable('simulacao'))
      $('.table-mobile__semplano').html(getTable('semPlano'))
      $('.table-mobile__beneficio').html(getTable('beneficioMaximo'))
    }

    var checkBeneficioFiscal = function() {
      var divBeneficioFiscal = $('.simulador-result-description')
      var valSimulacao = result.data.beneficioFiscal.simulacao
      var valBeneficioMaximo = result.data.beneficioFiscal.beneficioMaximo

      if (divBeneficioFiscal.hasClass('show')) {
        divBeneficioFiscal.removeClass('show')
      }

      if (valSimulacao < valBeneficioMaximo) {
        $('.simulador-result-description').addClass('show')
      }
    }

    var showAlert = function () {
      var alerts = result.data.warning

      $('.simulador-result-alert').each(function() {
        $(this).removeClass('show')
      })

      alerts.map(function(item) {
        var alert = $('.simulador-result-alert.' + item.cod)
        alert.addClass('show')
        alert.find('.valor').html(prettyCurrency(item.valor))
        if (item.cod === 'despesaEnsino') {
          alert.find('.base').html(prettyCurrency(item.base))
          alert.find('.dependentes').html(dataToPost.numeroDependentes)
        } else {
          alert.find('.base').html(item.base)
        }

        $('.table-result__fixed, .table-result__base').find('.' + item.cod).addClass('error')
      })
    }

    var showResult = function () {
      var offsetScroll = (window.innerWidth < 580) ? 50 : 100
      $('.simulador-result').addClass('show')
      showDesktopResult()
      showMobileResult()

      $('html, body').animate({
        scrollTop: $('.simulador-result').offset().top - offsetScroll
      },{
        duration: 600,
        easing: 'easeOutQuad'
      })
    }

    var validateForm = function () {
      var shouldSendData = true
      var recaptcha_response = $('textarea[name="g-recaptcha-response"]')

      $('.simulador-input').each(function() {
        var input = $(this)
        var inputValue = input.val()
        var inputName = input.attr('name')
        var inputClasses = input[0].className

        if (inputValue === '' || inputValue === null) {
          addErrorClass(input)
          shouldSendData = false
        }

        if(inputName === 'rendaBruta') {
          inputValue = parseFloat(input.maskMoney('unmasked')[0])

          if (inputValue <= 0) {
            addErrorClass(input)
            shouldSendData = false
          }
        }

        if (inputName === 'numeroDependentes') {
          inputValue = parseInt(inputValue)

          if (inputValue < 0) {
            inputValue = 0
          }
        }

        if (/mask-money-simulacaoir/.test(inputClasses)) {
          inputValue = sanitizeCurrency(input)
        }

        dataToPost[inputName] = inputValue
      })

      if (recaptcha_response.val() === '') {
        recaptcha_response.parent().addClass('invalid')
        shouldSendData = false
      }

      if (shouldSendData) {
        sendData(dataToPost)
      }
    }

    var dependentesOldValue = 0

    $('[name="numeroDependentes"]').on('focus', function () {
      dependentesOldValue = $(this).val()
      $(this).attr('placeholder', dependentesOldValue)
      $(this).val('')
    })

    $('[name="numeroDependentes"]').on('blur', function () {
      var val = $(this).val()
      
      if (val === '' || val === undefined) {
        $(this).val(dependentesOldValue)
      }
    })

    $('.mask-money-simulacaoir').maskMoney({
      prefix: 'R$ ',
      allowNegative: true,
      thousands: '.',
      decimal: ',',
      affixesStay: true,
      allowZero: true
    }).trigger('mask.maskMoney')

    $('.simulador-input').on('focus', function() {
      $(this).parent().removeClass('invalid')
    })

    $('.simulador-input[name="rendaBruta"]').on('keyup', function(e) {
      setINSS()
    })

    $('.simulador-input[name="rendaBruta"]').on('blur', function(e) {
      setINSS()
    })

    $('.simulador-input[name="tipoRenda"]').on('change', function(e) {
      setINSS()
    })

    $('#form-simulador').on('submit', function(e) {
      e.preventDefault()
      validateForm()
    })

  })
})(jQuery);
