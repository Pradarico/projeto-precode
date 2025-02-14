PGDMP  	    .                |            projeto    17rc1    17rc1     �           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                           false            �           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                           false            �           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                           false            �           1262    16388    projeto    DATABASE     ~   CREATE DATABASE projeto WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'Portuguese_Brazil.1252';
    DROP DATABASE projeto;
                     postgres    false            �            1259    16400    pedido    TABLE     �  CREATE TABLE public.pedido (
    ped_idpedparc integer NOT NULL,
    ped_codsku integer,
    ped_valorfrete numeric(10,2) NOT NULL,
    ped_valortotcomp numeric(12,5) NOT NULL,
    ped_formpag character varying(255) NOT NULL,
    ped_cpfcnpj character varying(255) NOT NULL,
    ped_nomeraz character varying(255) NOT NULL,
    ped_fantasia character varying(255) NOT NULL,
    ped_email character varying(255) NOT NULL,
    ped_cep character varying(255) NOT NULL,
    ped_num character varying(255) NOT NULL,
    ped_bairro character varying(255) NOT NULL,
    ped_cidade character varying(255) NOT NULL,
    ped_uf character varying(255) NOT NULL,
    ped_resid character varying(255) NOT NULL,
    ped_comer character varying(255),
    ped_cel character varying(255) NOT NULL,
    ped_valor numeric(20,2) NOT NULL,
    ped_quantparc integer NOT NULL,
    ped_meiopag character varying(255),
    ped_codapi integer,
    ped_endereco character varying(255)
);
    DROP TABLE public.pedido;
       public         heap r       postgres    false            �            1259    16399    pedido_ped_idpedparc_seq    SEQUENCE     �   CREATE SEQUENCE public.pedido_ped_idpedparc_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 /   DROP SEQUENCE public.pedido_ped_idpedparc_seq;
       public               postgres    false    220            �           0    0    pedido_ped_idpedparc_seq    SEQUENCE OWNED BY     U   ALTER SEQUENCE public.pedido_ped_idpedparc_seq OWNED BY public.pedido.ped_idpedparc;
          public               postgres    false    219            �            1259    16451    prodped    TABLE     �   CREATE TABLE public.prodped (
    ped_idpedparc integer,
    prodped_valunit numeric(20,2) NOT NULL,
    prodped_quant integer NOT NULL,
    pro_codsku integer,
    prodped_codprod integer NOT NULL
);
    DROP TABLE public.prodped;
       public         heap r       postgres    false            �            1259    16461    prodped_prodped_codprod_seq    SEQUENCE     �   CREATE SEQUENCE public.prodped_prodped_codprod_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 2   DROP SEQUENCE public.prodped_prodped_codprod_seq;
       public               postgres    false    221            �           0    0    prodped_prodped_codprod_seq    SEQUENCE OWNED BY     [   ALTER SEQUENCE public.prodped_prodped_codprod_seq OWNED BY public.prodped.prodped_codprod;
          public               postgres    false    222            �            1259    16390    produtos    TABLE     �  CREATE TABLE public.produtos (
    prod_codint integer NOT NULL,
    prod_nome character varying(255) NOT NULL,
    prod_descricao character varying(255) NOT NULL,
    prod_preco numeric(20,2) NOT NULL,
    prod_promo numeric(20,2) NOT NULL,
    prod_custo numeric(20,2) NOT NULL,
    prod_peso numeric(20,5) NOT NULL,
    prod_largura numeric(20,3) NOT NULL,
    prod_altura numeric(20,3) NOT NULL,
    prod_comprimento numeric(20,3) NOT NULL,
    prod_marca character varying(255) NOT NULL,
    prod_estoque character varying(255) NOT NULL,
    prod_situacao character varying(255) NOT NULL,
    prod_prazoent character varying(255),
    prod_estvend character varying(255),
    prod_estreal character varying(255)
);
    DROP TABLE public.produtos;
       public         heap r       postgres    false            �            1259    16389    produtos_prod_codint_seq    SEQUENCE     �   CREATE SEQUENCE public.produtos_prod_codint_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 /   DROP SEQUENCE public.produtos_prod_codint_seq;
       public               postgres    false    218            �           0    0    produtos_prod_codint_seq    SEQUENCE OWNED BY     U   ALTER SEQUENCE public.produtos_prod_codint_seq OWNED BY public.produtos.prod_codint;
          public               postgres    false    217            ,           2604    16403    pedido ped_idpedparc    DEFAULT     |   ALTER TABLE ONLY public.pedido ALTER COLUMN ped_idpedparc SET DEFAULT nextval('public.pedido_ped_idpedparc_seq'::regclass);
 C   ALTER TABLE public.pedido ALTER COLUMN ped_idpedparc DROP DEFAULT;
       public               postgres    false    220    219    220            -           2604    16462    prodped prodped_codprod    DEFAULT     �   ALTER TABLE ONLY public.prodped ALTER COLUMN prodped_codprod SET DEFAULT nextval('public.prodped_prodped_codprod_seq'::regclass);
 F   ALTER TABLE public.prodped ALTER COLUMN prodped_codprod DROP DEFAULT;
       public               postgres    false    222    221            +           2604    16393    produtos prod_codint    DEFAULT     |   ALTER TABLE ONLY public.produtos ALTER COLUMN prod_codint SET DEFAULT nextval('public.produtos_prod_codint_seq'::regclass);
 C   ALTER TABLE public.produtos ALTER COLUMN prod_codint DROP DEFAULT;
       public               postgres    false    217    218    218            �          0    16400    pedido 
   TABLE DATA           /  COPY public.pedido (ped_idpedparc, ped_codsku, ped_valorfrete, ped_valortotcomp, ped_formpag, ped_cpfcnpj, ped_nomeraz, ped_fantasia, ped_email, ped_cep, ped_num, ped_bairro, ped_cidade, ped_uf, ped_resid, ped_comer, ped_cel, ped_valor, ped_quantparc, ped_meiopag, ped_codapi, ped_endereco) FROM stdin;
    public               postgres    false    220   R$       �          0    16451    prodped 
   TABLE DATA           m   COPY public.prodped (ped_idpedparc, prodped_valunit, prodped_quant, pro_codsku, prodped_codprod) FROM stdin;
    public               postgres    false    221   @&       �          0    16390    produtos 
   TABLE DATA           �   COPY public.produtos (prod_codint, prod_nome, prod_descricao, prod_preco, prod_promo, prod_custo, prod_peso, prod_largura, prod_altura, prod_comprimento, prod_marca, prod_estoque, prod_situacao, prod_prazoent, prod_estvend, prod_estreal) FROM stdin;
    public               postgres    false    218   �&       �           0    0    pedido_ped_idpedparc_seq    SEQUENCE SET     G   SELECT pg_catalog.setval('public.pedido_ped_idpedparc_seq', 34, true);
          public               postgres    false    219            �           0    0    prodped_prodped_codprod_seq    SEQUENCE SET     J   SELECT pg_catalog.setval('public.prodped_prodped_codprod_seq', 13, true);
          public               postgres    false    222            �           0    0    produtos_prod_codint_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public.produtos_prod_codint_seq', 7, true);
          public               postgres    false    217            1           2606    16407    pedido pedido_pkey 
   CONSTRAINT     [   ALTER TABLE ONLY public.pedido
    ADD CONSTRAINT pedido_pkey PRIMARY KEY (ped_idpedparc);
 <   ALTER TABLE ONLY public.pedido DROP CONSTRAINT pedido_pkey;
       public                 postgres    false    220            3           2606    16464    prodped prodped_pkey 
   CONSTRAINT     _   ALTER TABLE ONLY public.prodped
    ADD CONSTRAINT prodped_pkey PRIMARY KEY (prodped_codprod);
 >   ALTER TABLE ONLY public.prodped DROP CONSTRAINT prodped_pkey;
       public                 postgres    false    221            /           2606    16397    produtos produtos_pkey 
   CONSTRAINT     ]   ALTER TABLE ONLY public.produtos
    ADD CONSTRAINT produtos_pkey PRIMARY KEY (prod_codint);
 @   ALTER TABLE ONLY public.produtos DROP CONSTRAINT produtos_pkey;
       public                 postgres    false    218            4           2606    16456 "   prodped prodped_ped_idpedparc_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.prodped
    ADD CONSTRAINT prodped_ped_idpedparc_fkey FOREIGN KEY (ped_idpedparc) REFERENCES public.pedido(ped_idpedparc);
 L   ALTER TABLE ONLY public.prodped DROP CONSTRAINT prodped_ped_idpedparc_fkey;
       public               postgres    false    220    221    4657            �   �  x���n�0���S� ��;Q�zpWްI6�M6��l{�Q�	
�1qىM<�J���B��ATWT�Z\��4���� �e�xl�e�QyNޕ��4]f�����\��R���|�<��i%Q����Q�&\�ڑ(8��b�b��8�8�Cp�Mp��
O2�'Y����]�<��i��Gx��i�en�w_r9�~�t��K4D
,��"t���*$���L�@��/�l�֣���-V6���g[x�YS��(P(�3
�V���<�@��(P��3
���
�T��(ж�g��>��A�C�ϡ��v��Xx���-��S�������AMZ�/q`{��p,���rT֨$mR���l�b�P���U�4F��9��Un���W�w�}��N���cz�c��q���]/N�'�c�->^������w&� �<�'��l������Z%�]���=�-$F��V$I����	      �   y   x�m���0�l1�{���8l)N��f`��&<T�$#���BXQ�v�0�9[.�1�q��bE�h�\�����^�+h�|a}3����9�Op{�T���:��&��@��&�s�W�� ~&P2�      �   �   x����� ���<AS8��]f�mqF��Ֆ\��a	��6����*�G�Y�k qՐ*�v��A�k㠺�8Լ���G̆d8��1ͭ��3��4<Ӵ�l`ė���)`�Ց<�`ʕ9�d��jl�ņ��BwL?���A��ݳz�B���'�B6��JHZ�fI�     