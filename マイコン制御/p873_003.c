//	<< p873_003.c >>		2012/02 Y.Takada
//	Port_B�ɐڑ�����Ă���LED��0����128�܂ŏ��ԂɓX��
//
#include <j:\ccs-c\devices\16f873a.h>
#Fuses HS,NOWDT,NOPROTECT,NOLVP
#use delay(clock=20000000)
void main(void)
{
	int i;
	set_tris_b(0x00);					
	output_b(0x00);
	
	for(i=0;i<=128;i++)	{				//	{}���̏�����129��J��Ԃ�	
		output_b(i);					//	i -> PORT_B	
		delay_ms(100);					//	100ms�҂�
						
	}
}